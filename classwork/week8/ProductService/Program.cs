using System.Collections.Generic;
using ProductService.Models;
using Microsoft.OpenApi.Models;

// Create dummy data
var products = new List<Product>();
for (int i = 1; i <= 5; i++)
{
    products.Add(new Product() { Name = "Product " + i, Id = i });
}

var builder = WebApplication.CreateBuilder(args);

// Fix: Correct OpenAPI/Swagger setup
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen(c =>
{
    c.SwaggerDoc("v1", new OpenApiInfo { Title = "My API", Version = "v1" });
});

var app = builder.Build();

// Fix: Proper Swagger UI setup
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI(c =>
    {
        c.SwaggerEndpoint("/swagger/v1/swagger.json", "My API V1");
    });
}

app.UseHttpsRedirection();

app.MapGet("/", () => "Hello World!");

app.MapGet("/Product", () => products);

app.MapGet("/Product/{id}", (int id) =>
{
    Product? product = products.Find(x => x.Id == id);
    if (product == null)
    {
        return Results.NotFound();
    }
    return Results.Ok(product);
});

app.MapPost("/Product", (Product product) =>
{
    // Validate and sanitize
    bool isValid = !string.IsNullOrWhiteSpace(product.Name) &&
                   product.Name.Length < 40;

    if (product == null || !isValid)
    {
        return Results.BadRequest();
    }

    // Insert into DB
    product.Id = 6;
    return Results.Created($"Product/{product.Id}", product);
});

app.MapPut("/Product/{id}", (int id, Product product) =>
{
    // Validate and sanitize
    bool isValid = !string.IsNullOrWhiteSpace(product.Name) &&
                   product.Name.Length < 40 && product.Id == id;

    if (product == null || !isValid)
    {
        return Results.BadRequest();
    }

    // Fix: Corrected Exists() method
    if (!products.Exists(x => x.Id == id))
    {
        return Results.NotFound();
    }

    // Update in DB
    return Results.NoContent();
});

app.MapDelete("/Product/{id}", (int id) =>
{
    // Fix: Corrected Exists() method
    if (!products.Exists(x => x.Id == id))
    {
        return Results.NotFound();
    }

    // Delete from DB
    return Results.NoContent();
});

app.MapGet("/Product2/{id}", (int id) =>
{
    Product? product = products.Find(x => x.Id == id);
    if (product == null)
    {
        return Results.NotFound();
    }
    var returnProd = new Dictionary<string, object>
    {
        { "id", product.Id },
        { "name", product.Name }
    };
    return Results.Ok(returnProd);
});

app.Run();
