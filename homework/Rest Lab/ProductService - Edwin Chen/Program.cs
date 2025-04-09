using Microsoft.OpenApi.Models;
using Swashbuckle.AspNetCore;
using System.Collections.Generic;
using ProductService.Models;
using Microsoft.OpenApi.Models;

//data
var products = new List<Product>
{
    new Product { Id = 1, Name = "Apples", Price = 3.99m },
    new Product { Id = 2, Name = "Peaches", Price = 4.05m },
    new Product { Id = 3, Name = "Pumpkin", Price = 13.99m },
    new Product { Id = 4, Name = "Pie", Price = 8.00m }
};

var builder = WebApplication.CreateBuilder(args);

builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen(c =>
{
    c.SwaggerDoc("v1", new OpenApiInfo { Title = "My API", Version = "v1" });
});

var app = builder.Build();

//SwaggerUi
if (app.Environment.IsDevelopment()) 
{
    app.UseSwagger();
    app.UseSwaggerUI(c =>
    {
        c.SwaggerEndpoint("/swagger/v1/swagger.json", "My API V1");
    });
}

app.UseHttpsRedirection();

app.MapGet("/", () => "/Services/Products to get Products" +
"\n/Services/Products/Cheapest to get the cheapest product" +
"\n/Services/Products/Costliest to get the costliest product" + 
"\n/Services/Products/{product} to get a specific product");

app.MapGet("/Services/Products", getProducts);

app.MapGet("/Services/Products/Cheapest", getCheapest);

app.MapGet("/Services/Products/Costliest", getCostliest);

app.MapGet("/Services/Products/{product}", getProduct);

app.Run();

IEnumerable<Product> getProducts()
{
    return products;
}

IResult getCheapest()
{
    var cheapest = products.Where(p => p.Price == products.Min(i => i.Price))
    .FirstOrDefault();
    return Results.Ok(new { Name = cheapest.Name, Price = cheapest.Price});
}

IResult getCostliest()
{
    var costliest = products.Where(p => p.Price == products.Max(i => i.Price))
    .FirstOrDefault();
    return Results.Ok(new { Name = costliest.Name, Price = costliest.Price});
}

IResult getProduct(string product)
{
    var matchingProduct = products.Find(p => p.Name.Equals(product, StringComparison.OrdinalIgnoreCase));
    if (matchingProduct == null)
    {
        return Results.NotFound();
    }
    var returnProduct = new Dictionary<string, object>
    {
        { "Name", matchingProduct.Name },
        { "Price", matchingProduct.Price }
    };
    return Results.Ok(returnProduct);
}