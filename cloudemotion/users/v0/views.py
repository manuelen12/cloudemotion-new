# Stdlib imports

# Core Django imports
# Third-party app imports
from rest_framework import viewsets
from rest_framework import permissions

# Imports from your apps
from common.utils import default_responses
from .api import API
from .serializers import (
    SicknessSerializer,
    CreateUSerSerializers, LoginSerializers,
    RecoverPasswordSerializers,
    ChangePasswordSerializers,
    UpdateUserProfileSerializers,
    RolesSerializer,
    EthnicitiesSerializer,
    FetishesSerializer,
    PreferenceSerializer,
    ProfessionsSerializer,
    PhysicalConflectionsSerializer,
    HobbiesSerializer,
    CreateUSerAdminSerializers,
    ConfirmationSerializers,
    HobbiesUserSerializers,
    PreferenceUserSerializers,
    FetishesUserSerializers,
    SicknessUserSerializers,
    UpdateProfileSerializers,
    # DistanceSerializers,
    StatusUserSerializers,
    FolderUserSerializers,
    FolderImageSerializers,
    ImageSerializers,
    Login1Serializers,
    ImageUsSerializers,
    FavoriteSerializers,
    PasswordChangeSerializers
)
from gaver.users.models import (Sickness, Roles,
                                Ethnicities,
                                Fetishes,
                                Preference,
                                Professions,
                                PhysicalConflections,
                                Hobbies)
from django.contrib.auth import get_user_model
# from rest_framework.viewsets import GenericViewSet
User = get_user_model()


class UserViews(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    """
        POST To Login with some user
        GET All local files
        GET /{id}/ get just the information of a file
        PUT /{id}/ Change the privileges of the file or share a file
        DELETE /{id}/ DELETE a file
    """
    serializer_class = CreateUSerSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.register_user()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = StatusUserSerializers
        serializer = API(request)
        serializer.get_users(pk)
        if serializer.error:
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def update(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.status_user(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    # def destroy(self, request, pk, *args, **kwargs):
    #     serializer = API(request)
    #     serializer.delete_user(pk)
    #     if serializer.error:
    #         return default_responses(404, serializer.error)

    #     return default_responses(200, serializer.result)


class UserAdminViews(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    """
        POST To Login with some user
        GET All local files
        GET /{id}/ get just the information of a file
        PUT /{id}/ Change the privileges of the file or share a file
        DELETE /{id}/ DELETE a file
    """
    serializer_class = CreateUSerAdminSerializers

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
        self.serializer_class = CreateUSerAdminSerializers
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


class SicknessViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """
    serializer_class = SicknessSerializer
    # permission_classes = [IsAccountAdminOrReadOnly]

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_sickness()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Sickness.objects.filter(status=True)


class RolesViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """
    serializer_class = RolesSerializer
    # permission_classes = [IsAccountAdminOrReadOnly]

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_roles()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Roles.objects.filter(status=True)


class EthnicitiesViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """
    serializer_class = EthnicitiesSerializer
    # permission_classes = [IsAccountAdminOrReadOnly]

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_ethnicities()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Ethnicities.objects.filter(status=True)


class FetishesViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """
    serializer_class = FetishesSerializer
    # permission_classes = [IsAccountAdminOrReadOnly]

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_fetishes()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Fetishes.objects.filter(status=True)


class PreferenceViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """
    serializer_class = PreferenceSerializer
    # permission_classes = [IsAccountAdminOrReadOnly]

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_preference()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Preference.objects.filter(status=True)


class ProfessionsViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """
    serializer_class = ProfessionsSerializer
    # permission_classes = [IsAccountAdminOrReadOnly]

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_professions()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Professions.objects.filter(status=True)


class PhysicalConflectionsViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """
    serializer_class = PhysicalConflectionsSerializer
    # permission_classes = [IsAccountAdminOrReadOnly]

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_physical()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return PhysicalConflections.objects.filter(status=True)


class HobbiesViewsets(viewsets.ModelViewSet):
    # permission_classes = (permissions.AllowAny,)
    # permission_classes = (UserDispensor2,)
    """
    A simple ViewSet for viewing and editing the accounts
    associated with the user.
    """
    serializer_class = HobbiesSerializer
    # permission_classes = [IsAccountAdminOrReadOnly]

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_hobbies()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def get_queryset(self):
        return Hobbies.objects.filter(status=True)


class LoginViewSet(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    serializer_class = LoginSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.login_user()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)
        return default_responses(200, serializer.result)


class Login1ViewSet(viewsets.ViewSet):
    permission_classes = (permissions.AllowAny,)
    serializer_class = Login1Serializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.login_user1()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)
        return default_responses(200, serializer.result)



class PasswordViewSet(viewsets.GenericViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = RecoverPasswordSerializers

    def create(self, request, format=None, *args, **kwargs):
        # import ipdb; ipdb.set_trace()
        serializer = API(request)
        serializer.recover_password()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)
        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = ChangePasswordSerializers

        return default_responses(200, pk)

    def update(self, request, pk=None, *args, **kwargs):
        serializer = API(request)
        serializer.change_password(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class ConfirmationViewSet(viewsets.GenericViewSet):

    permission_classes = (permissions.AllowAny,)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = ConfirmationSerializers

        return default_responses(200, pk)

    def update(self, request, pk=None, *args, **kwargs):
        serializer = API(request)
        serializer.change_confirmation(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class ProfileViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = UpdateUserProfileSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.update_user_session()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users(request.user.id)
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        # self.serializer_class = CreateUSerAdminSerializers
        serializer = API(request)
        serializer.get_users(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)


class ProfileUserViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = UpdateProfileSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.update_user()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)


class HobbiesProfileViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = HobbiesUserSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.hobbies_user()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = CreateUSerAdminSerializers

        return default_responses(200, pk)

    def destroy(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.hobbies_user_delete(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class PreferenceProfileViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = PreferenceUserSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.preference_user()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = CreateUSerAdminSerializers

        return default_responses(200, pk)

    def destroy(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.preference_user_delete(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class FetishesProfileViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = FetishesUserSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.fetishes_user()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = CreateUSerAdminSerializers

        return default_responses(200, pk)

    def destroy(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.fetishes_user_delete(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class SicknessProfileViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = SicknessUserSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.sickness_user()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.list_sickness()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = CreateUSerAdminSerializers

        return default_responses(200, pk)

    def destroy(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.sickness_user_delete(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class UserAppViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    """
        para probarlo es asi:
        http://192.168.1.101:8020/api/v0/home_app/?filters={%22latitude%22:%224.570868%22,%22longitude%22:%22-74.29733299999998%22}
    """
    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users_app()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    # def retrieve(self, request, pk, *args, **kwargs):
    #     self.serializer_class = CreateUSerAdminSerializers

    #     return default_responses(200, pk)

    # def destroy(self, request, pk, *args, **kwargs):
    #     serializer = API(request)
    #     serializer.sickness_user_delete(pk)
    #     if serializer.error:
    #         return default_responses(404, serializer.error)

    #     return default_responses(200, serializer.result)


class UserAppHViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    """
        para probarlo es asi:
        http://192.168.1.101:8020/api/v0/home_app/?filters={%22latitude%22:%224.570868%22,%22longitude%22:%22-74.29733299999998%22}
    """
    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users_app_f()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)


class FolderUserViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = FolderUserSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.create_folder()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users_folder()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        # self.serializer_class = CreateUSerAdminSerializers
        serializer = API(request)
        serializer.get_users_folder(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def update(self, request, pk, *args, **kwargs):
        self.serializer_class = CreateUSerAdminSerializers
        serializer = API(request)
        serializer.update_folder(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def destroy(self, request, pk, *args, **kwargs):
        serializer = API(request)
        serializer.delete_folder(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class FolderUserImageViewSet(viewsets.ViewSet):

    # permission_classes = (permissions.AllowAny,)
    serializer_class = FolderImageSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.create_img()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users_file()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = ImageSerializers

        return default_responses(200, pk)

    def update(self, request, pk=None, *args, **kwargs):
        serializer = API(request)
        serializer.update_file(pk)
        if serializer.error:
            print(serializer.error)
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)

    def delete(self, request, *args, **kwargs):
        # import ipdb; ipdb.set_trace()
        serializer = API(request)
        serializer.delete_file()
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class MoveFileViewSet(viewsets.ViewSet):

    def update(self, request, pk, *args, **kwargs):
        # import ipdb; ipdb.set_trace()
        serializer = API(request)
        serializer.move_file(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class SearchPlacesViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    # serializer_class = FolderImageSerializers

    # def create(self, request, format=None, *args, **kwargs):
    #     serializer = API(request)
    #     serializer.create_img()
    #     if serializer.error:
    #         print(serializer.error)
    #         return default_responses(400, serializer.error)

    #     return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users_places()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    # def retrieve(self, request, pk, *args, **kwargs):
    #     self.serializer_class = ImageSerializers

    #     return default_responses(200, pk)

    # def update(self, request, pk=None, *args, **kwargs):
    #     serializer = API(request)
    #     serializer.update_file(pk)
    #     if serializer.error:
    #         print(serializer.error)
    #         return default_responses(404, serializer.error)

    #     return default_responses(200, serializer.result)

    # def destroy(self, request, pk, *args, **kwargs):
    #     serializer = API(request)
    #     serializer.delete_file(pk)
    #     if serializer.error:
    #         return default_responses(404, serializer.error)

    #     return default_responses(200, serializer.result)


class SearchUsersViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    # serializer_class = FolderImageSerializers

    # def create(self, request, format=None, *args, **kwargs):
    #     serializer = API(request)
    #     serializer.create_img()
    #     if serializer.error:
    #         print(serializer.error)
    #         return default_responses(400, serializer.error)

    #     return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users_folder_users()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)


class MoveImageViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = ImageUsSerializers

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users_file()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def create(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.move_img_public()
        if serializer.error:
            print(serializer.error)
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class DashboardViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    # serializer_class = ImageUsSerializers

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.dashboards()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    # def create(self, request, *args, **kwargs):
    #     serializer = API(request)
    #     serializer.move_img_public()
    #     if serializer.error:
    #         print(serializer.error)
    #         return default_responses(404, serializer.error)

    #     return default_responses(200, serializer.result)


class FavoriteUserViewSet(viewsets.ViewSet):

    permission_classes = (permissions.AllowAny,)
    serializer_class = FavoriteSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.create_favorite_user()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def list(self, request, *args, **kwargs):
        serializer = API(request)
        serializer.get_users_favorite()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)

    def retrieve(self, request, pk, *args, **kwargs):
        self.serializer_class = ImageSerializers

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
        serializer.delete_favorite_user(pk)
        if serializer.error:
            return default_responses(404, serializer.error)

        return default_responses(200, serializer.result)


class PasswordChangeViewSet(viewsets.ViewSet):

    # permission_classes = (permissions.AllowAny,)
    serializer_class = PasswordChangeSerializers

    def create(self, request, format=None, *args, **kwargs):
        serializer = API(request)
        serializer.change_password2()
        if serializer.error:
            print(serializer.error)
            return default_responses(400, serializer.error)

        return default_responses(200, serializer.result)
