from django.contrib import admin
from .models import Product, Category, ZipCode

class ProductAdmin(admin.ModelAdmin):
    list_display = ['title','updated_at', 'created_at']



admin.site.register(Product, ProductAdmin)
admin.site.register(Category)
admin.site.register(ZipCode)