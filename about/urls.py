from django.conf.urls import url

urlpatterns = [
    url(r'^$', 'about.views.about_me'),
]
