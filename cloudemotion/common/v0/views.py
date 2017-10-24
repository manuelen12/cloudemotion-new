# Third-party app imports
from rest_framework import viewsets
# Imports from your apps
from common.utils import default_responses, UploadFile
from .api import Controller
from rest_framework import permissions
from .serializers import (UploadSerializers,
                        PositionSerializers,
                        LanguajeSerializers,
                        ChangeIdiomSerializers,
                        )
from cloudemotion.common.models import (Positions,
                                        Languajes,
                                        )
# from login.models import Profile

# from common.pagination import LinkHeaderPagination
# from rest_framework import generics
# from json import loads


class UploadView(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    serializer_class = UploadSerializers
    """
    HOOLA
    """
    def create(self, request, *args, **kwargs):

        serializer = UploadFile(request)
        serializer.upload()

        if serializer.error:
            print(serializer.error)
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class PositionsView(viewsets.ModelViewSet):
    serializer_class = PositionSerializers
    """
    Get Positions
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.get_position()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Positions.objects.filter(status=True)


class LanguajesView(viewsets.ModelViewSet):
    serializer_class = LanguajeSerializers
    """
    Get Languajes
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.get_languaje()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Languajes.objects.filter(status=True)

class ChangeIdiomView(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    serializer_class = ChangeIdiomSerializers

    """
    Change Language
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.current_idiom()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def create(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.change_idiom()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)
