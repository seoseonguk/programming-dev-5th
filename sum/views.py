from django.shortcuts import render
from django.http import HttpResponse

def mysum(request, x, y=0, z=0):
	return HttpResponse(int(x) + int(y) + int(z))
