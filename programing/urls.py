from django.conf import settings
from django.conf.urls import url, include
from django.conf.urls.static import static
from django.contrib import admin


urlpatterns = [
    url(r'^admin/',include(admin.site.urls)),
    url(r'^about/', include('about.urls', namespace='about')),
    # url(r'^', include('blog.urls', namespace='blog')),
    url(r'^', include('products.urls', namespace='product'))
]


if settings.DEBUG:
    urlpatterns += static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)