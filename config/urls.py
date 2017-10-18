from django.conf import settings
from django.conf.urls import include, url
from django.conf.urls.static import static
from django.contrib import admin
from django.views.generic import TemplateView
from django.views import defaults as default_views
from common.utils import DefaultRouter
from common.v0.urls import router as common
from users.v0.urls import router as users
from rest_framework_jwt.views import (
    refresh_jwt_token, obtain_jwt_token, verify_jwt_token)
from django.views.static import serve
router = DefaultRouter()
# router.extend(upload)
router.extend(common)
router.extend(users)


urlpatterns = [
    url(r'^components/(?P<path>.*)$',
        serve,
        {'document_root': "cloudemotion/templates/porto/components/", 'show_indexes': True}),
    url(r'^api/v0/tmp_media/(?P<path>.*)$',
        serve,
        {'document_root': "cloudemotion/media/tmp_media/", 'show_indexes': True}),
    url(r'^core/(?P<path>.*)$',
        serve,
        {'document_root': "cloudemotion/templates/porto/core/", 'show_indexes': True}),
    url(r'^assets/(?P<path>.*)$',
        serve,
        {'document_root': "cloudemotion/templates/porto/assets/", 'show_indexes': True}),

    url(r'^curriculum/(?P<id>.*)$', TemplateView.as_view(
        template_name='porto/index.html'), name='home'),

    url(r'^about/$', TemplateView.as_view(
        template_name='pages/about.html'), name='about'),
    url(r'^api/api-token-auth/', obtain_jwt_token),
    url(r'^api/api-token-verify/', verify_jwt_token),
    url(r'^api/api-token-auth/', obtain_jwt_token),
    url(r'^api/api-token-refresh/', refresh_jwt_token),
    url(r'^api/v0/', include(router.urls, namespace='api')),
    url(r'^api/api-auth/',
        include('rest_framework.urls', namespace='rest_framework')),
    # Django Admin, use {% url 'admin:index' %}
    url(settings.ADMIN_URL, admin.site.urls),

    # User management
    url(r'^users/', include('cloudemotion.users.urls', namespace='users')),
    url(r'^accounts/', include('allauth.urls')),

    # Your stuff: custom urls includes go here


] + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)

if settings.DEBUG:
    # This allows the error pages to be debugged during development, just visit
    # these url in browser to see how these error pages look like.
    urlpatterns += [
        url(r'^400/$', default_views.bad_request,
            kwargs={'exception': Exception('Bad Request!')}),

        url(r'^403/$', default_views.permission_denied,
            kwargs={'exception': Exception('Permission Denied')}),

        url(r'^404/$', default_views.page_not_found,
            kwargs={'exception': Exception('Page not Found')}),

        url(r'^500/$', default_views.server_error),
    ]
    if 'debug_toolbar' in settings.INSTALLED_APPS:
        import debug_toolbar
        urlpatterns = [
            url(r'^__debug__/', include(debug_toolbar.urls)),
        ] + urlpatterns
