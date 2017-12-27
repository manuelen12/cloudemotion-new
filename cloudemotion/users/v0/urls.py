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
from django.contrib import admin
from .views import (UserAdminViews,
					# PotfUserViews,
					ContactsViewsets,
                    )
# from rest_framework.urlpatterns import format_suffix_patterns

router = routers.SimpleRouter()

router.register(r'users', UserAdminViews, base_name='users')
# router.register(r'potf_user', PotfUserViews, base_name='potf_user')
router.register(r'contacts', ContactsViewsets, base_name='contacts')
