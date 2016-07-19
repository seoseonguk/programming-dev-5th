from django.contrib import admin
from .models import Product, Category

class ProductAdmin(admin.ModelAdmin):
    list_display = ['title','updated_at', 'created_at']

admin.site.register(Product, ProductAdmin)
admin.site.register(Category)