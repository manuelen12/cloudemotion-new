# Stdlib imports

# Core Django imports
# Third-party app imports
from rest_framework import viewsets
from rest_framework import permissions

# Imports from your apps
from common.utils import default_responses
from .api import API
from .serializers import (
    CategorySerializer,
    PlacesSerializers,
    CommentarySerializers,
    CommentaryUpdateSerializers,
    PlacesImageSerializers,
    PlacesFavoriteSerializers
)
from gaver.places.models import (Category)
from django.contrib.auth import get_user_model
# from rest_framework.viewsets import GenericViewSet
User = get_user_model()


class CategoryViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """
    serializer_class = CategorySerializer

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_category()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Category.objects.filter(status=True)


class PlacesViews(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    """
        POST To Login with some user
        GET All local files
        GET /{id}/ get just the information of a file
        PUT /{id}/ Change the privileges of the file or share a file
        DELETE /{id}/ DELETE a file
    """
    serializer_class = PlacesSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.create_places()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_places()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = PlacesSerializers

        return default_responses(200, pk)

    # def update(self, request, pk, *args, **kwargs):
    #     serializer = API(request)
    #     serializer.update_user_admin(pk)
    #     if serializer.error:
    #         print(serializer.error)
    #         return default_responses(404, serializer.error)

    #     return default_responses(200, serializer.result)

    def destroy(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.delete_places(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class CommentaryViews(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    """
        POST To Login with some user
        GET All local files
        GET /{id}/ get just the information of a file
        PUT /{id}/ Change the privileges of the file or share a file
        DELETE /{id}/ DELETE a file
    """
    serializer_class = CommentarySerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.create_comment()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_commentary()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = CommentaryUpdateSerializers

        return default_responses(200, pk)

    def update(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.update_comment(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def destroy(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.delete_commentary(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class PlacesImageViews(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    """
        POST To Login with some user
        GET All local files
        GET /{id}/ get just the information of a file
        PUT /{id}/ Change the privileges of the file or share a file
        DELETE /{id}/ DELETE a file
    """
    serializer_class = PlacesImageSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.create_places_image()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_places_all()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):

        return default_responses(200, pk)

    def destroy(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.delete_places_image(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class PlacesFavoriteUserViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = PlacesFavoriteSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.create_favorite_places()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_places_favorite()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        return default_responses(200, pk)

    def update(self, request, pk=None, *args, **kwargs):
        serializer = API(request)
        serializer.update_file(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def delete(self, request, pk=None, *args, **kwargs):
        # import ipdb; ipdb.set_trace()
        serializer = API(request)
        serializer.delete_favorite_places(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)
