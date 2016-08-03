from django.shortcuts import render, get_object_or_404

from .models import Product


def product_list(request):
    object_list = Product.objects.all()
    context = {
        'object_list':object_list,
    }
    return render(request, 'home.html', context)

def product_detail(request, pk):
    product = get_object_or_404(Product, pk=pk)

    context ={
        'product':product,
    }
    return render(request, 'products/product_detail.html', context)
