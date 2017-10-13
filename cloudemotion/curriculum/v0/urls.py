"""configuration_test URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/1.10/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  url(r'^$', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  url(r'^$', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.conf.urls import url, include
    2. Add a URL to urlpatterns:  url(r'^blog/', include('blog.urls'))
"""
# from django.conf.urls import url, include
from rest_framework import routers
from .views import (CategoryViewsets,
                    PlacesViews,
                    CommentaryViews,
                    PlacesImageViews,
                    PlacesFavoriteUserViewSet
                    )
# from rest_framework.urlpatterns import format_suffix_patterns

router = routers.SimpleRouter()
router.register(r'category', CategoryViewsets, base_name='category')
router.register(r'places', PlacesViews, base_name='places')
router.register(r'commentary', CommentaryViews, base_name='commentary')
router.register(r'places_file', PlacesImageViews, base_name='places_file')
router.register(r'favorite_places', PlacesFavoriteUserViewSet, base_name='favorite_places')
