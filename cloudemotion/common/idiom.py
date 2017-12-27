# from django.utils.functional import SimpleLazyObject
# from django.contrib.auth.models import AnonymousUser
from django.utils import translation
from django.utils.deprecation import MiddlewareMixin
# from rest_framework.request import Request
# from rest_framework_jwt.authentication import JSONWebTokenAuthentication
from django.conf import settings


class LanguageMiddleware(MiddlewareMixin):

    def process_request(self, request):
        try:
            request.session[translation.LANGUAGE_SESSION_KEY]
        except:
            user_language = settings.LANGUAGE_CODE
            translation.activate(user_language)
            request.session[translation.LANGUAGE_SESSION_KEY] = user_language
