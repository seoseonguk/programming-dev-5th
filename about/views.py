from django.shortcuts import render

def about_me(request):
    context = {}
    return render(request, 'about/about_me.html', context)