# Stdlib imports

# Core Django imports
# Third-party app imports
from rest_framework import viewsets
from rest_framework import permissions

# Imports from your apps
from common.utils import default_responses
from .api import Controller
from .api import API
from .serializers import (
        UsersSerializers
)
from cloudemotion.users.models import (Users)
from django.contrib.auth import get_user_model
# from rest_framework.viewsets import GenericViewSet
User = get_user_model()


class UserAdminViews(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    """
        POST To Login with some user
        GET All local files
        GET /{id}/ get just the information of a file
        PUT /{id}/ Change the privileges of the file or share a file
        DELETE /{id}/ DELETE a file
    """
    # serializer_class = CreateUSerAdminSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.register_user_admin()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users_admin()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        # self.serializer_class = CreateUSerAdminSerializers
        serializer = API(request)
        serializer.get_users_admin(pk)
        if serializer.error:
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def update(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.update_user_admin(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def destroy(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.delete_user_admin(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class UsersViews(viewsets.ModelViewSet):
    serializer_class = UsersSerializers
    """
    Get Users
    """

    def list(self, request, *args, **kwargs):
        serializer = Controller(request)
        serializer.get_user()

        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Users.objects.filter(status=True)
