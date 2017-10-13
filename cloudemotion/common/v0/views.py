# Third-party app imports
from rest_framework import viewsets
# Imports from your apps
from common.utils import default_responses, UploadFile
from .api import Controller
from rest_framework import permissions
from .serializers import (PositionSerializers, UploadSerializers)
from cloudemotion.common.models import (Positions)
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
    permission_classes = (permissions.AllowAny,)
    serializer_class = PositionSerializers
    """
    Get Positions
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.get_positions()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Positions.objects.filter(status=True)


class StateView(viewsets.ModelViewSet):
    permission_classes = (permissions.AllowAny,)
    serializer_class = StateSerializers
    """
    Get Country
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.get_state()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return State.objects.filter(status=True)


class CityView(viewsets.ModelViewSet):
    permission_classes = (permissions.AllowAny,)
    serializer_class = CitySerializers
    """
    Get Country
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.get_city()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return City.objects.filter(status=True)


class PositionViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    permission_classes = (UserDispensor2,)
    serializer_class = PositionSerializers
    # permission_classes = [IsAccountAdminOrReadOnly]

    def get_queryset(self):
        return Positions.objects.filter(status=True)


class CountriesView(viewsets.ModelViewSet):
    permission_classes = (permissions.AllowAny,)
    serializer_class = CountrySerializers
    """
    Get Country
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.get_countries()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Country.objects.filter(status=True)


class StatesView(viewsets.ModelViewSet):
    permission_classes = (permissions.AllowAny,)
    serializer_class = StateSerializers
    """
    Get Country
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.get_states_app()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return State.objects.filter(status=True)


class CitysView(viewsets.ModelViewSet):
    permission_classes = (permissions.AllowAny,)
    serializer_class = CitySerializers
    """
    Get Country
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.get_cities()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return City.objects.filter(status=True)
