from django.shortcuts import render
from .models import Product


def home(request):
    object_list = Product.objects.all()
    context = {
        'object_list':object_list,
    }
    return render(request, 'home.html', context)