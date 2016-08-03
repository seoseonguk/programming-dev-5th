from django.conf.urls import url
from products import views

urlpatterns =[

    url(r'^$', views.product_list, name='product_list'),
    url(r'^(?P<pk>\d+)/$', views.product_detail, name='product_detail'),
    url(r'^comment/new$', views.comment_new, name='comment_new'),
    url(r'^comment/(?P<com_pk>\d+)/edit/$', views.comment_edit, name='comment_edit')

]