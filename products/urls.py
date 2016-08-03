from django.conf.urls import url
from products import views

urlpatterns =[

    url(r'^$', views.product_list, name='product_list'),
    url(r'^(?P<pk>\d+)/$', views.product_detail, name='product_detail')

]