# Stdlib imports

# Core Django imports
# Third-party app imports
from rest_framework import viewsets
from rest_framework import permissions

# Imports from your apps
from common.utils import default_responses
#from .api import Controller
from .api import API
from .serializers import (
        UsersSerializers,
        ContactSerializer,
)
from cloudemotion.users.models import (User)
from django.core.mail import send_mail
# from django.contrib.auth import get_user_model
# from rest_framework.viewsets import GenericViewSet
# User = get_user_model()


class UserAdminViews(viewsets.ViewSet):
    permission_classes = ()
    # permission_classes = (permissions.AllowAlways,)
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
        serializer.get_user()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        # self.serializer_class = CreateUSerAdminSerializers
        serializer = API(request)
        serializer.get_user(pk)
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


class ContactsViewsets(viewsets.ViewSet):
    permission_classes = ()
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """

    # permission_classes = [IsAccountAdminOrReadOnly]
    serializer_class = ContactSerializer

    def create(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.send_contact()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)


class PotfUserViews(viewsets.ViewSet):
    permission_classes = ()

    def retrieve(self, request, pk, *args, **kwargs):
        # self.serializer_class = CreateUSerAdminSerializers
        serializer = API(request)
        serializer.get_portf_user(pk)
        if serializer.error:
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)
