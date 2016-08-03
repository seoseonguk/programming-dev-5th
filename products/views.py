from django.shortcuts import render, get_object_or_404, redirect

from .models import Product,Comment
from .forms import CommentForm


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


def comment_new(request):
    if request.method == 'POST':
        form = CommentForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('/')
    else:
        form = CommentForm()

    context = {
        'comment_form':form
    }

    return render(request, 'products/comment_form.html', context)

def comment_edit(request, com_pk):
    comment = Comment.objects.get(pk=com_pk)
    if request.method == 'POST':
        form = CommentForm(request.POST, instance=comment)
        if form.is_valid():
            form.save()
            return redirect('/')
    else:
        form = CommentForm(instance=comment)

    context = {
        'comment_form':form
    }

    return render(request, 'products/comment_form.html', context)