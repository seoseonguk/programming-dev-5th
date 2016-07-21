from django.conf.urls import url
from sum import views


urlpatterns = [
	url(r'(?P<x>[\d/]+)/$', views.mysum2),
	# url(r'(?P<x>\d+)/(?P<y>\d+)/(?P<z>\d+)/$', views.mysum),
	# url(r'(?P<x>\d+)/(?P<y>\d+)/$', views.mysum),
	# url(r'(?P<x>\d+)/$', views.mysum),

]
