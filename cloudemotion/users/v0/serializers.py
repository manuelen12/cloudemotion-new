
# Stdlib imports
# Core Django imports
# Third-party app imports
from rest_framework import serializers
from cloudemotion.common.models import City
from cloudemotion.users.models import (Users)
from json import dumps
# from django import forms
# Imports from your apps
from django.contrib.auth import get_user_model
User = get_user_model()


class UsersSerializers(serializers):
    class Meta:
        model = Sickness
        fields = ('id', 'name')


class RolesSerializer(serializers.ModelSerializer):
    class Meta:
        model = Roles
        fields = ('id', 'name')


class EthnicitiesSerializer(serializers.ModelSerializer):
    class Meta:
        model = Ethnicities
        fields = ('id', 'name')


class FetishesSerializer(serializers.ModelSerializer):
    class Meta:
        model = Fetishes
        fields = ('id', 'name')


class PreferenceSerializer(serializers.ModelSerializer):
    class Meta:
        model = Preference
        fields = ('id', 'name')


class ProfessionsSerializer(serializers.ModelSerializer):
    class Meta:
        model = Professions
        fields = ('id', 'name')


class PhysicalConflectionsSerializer(serializers.ModelSerializer):
    class Meta:
        model = PhysicalConflections
        fields = ('id', 'name')


class HobbiesSerializer(serializers.ModelSerializer):
    class Meta:
        model = Hobbies
        fields = ('id', 'name')


class LoginSerializers(serializers.Serializer):

    username = serializers.EmailField()
    password = serializers.CharField()


class Login1Serializers(serializers.Serializer):

    username = serializers.EmailField()
    password = serializers.CharField()
    token = serializers.CharField()


class UpdateUserProfileSerializers(serializers.Serializer):

    username = serializers.CharField()
    first_name = serializers.CharField()
    last_name = serializers.CharField()
    password = serializers.CharField()
    confirm_password = serializers.CharField()
    email = serializers.EmailField()
    confirm_email = serializers.EmailField()
    city_id = serializers.SlugRelatedField(
              queryset=City.objects.filter(),
              slug_field='id')
    rol_sexual_id = serializers.SlugRelatedField(
                    queryset=Roles.objects.filter(),
                    slug_field='id')
    professions_id = serializers.SlugRelatedField(
                     queryset=Professions.objects.filter(),
                     slug_field='id')
    ethnicities_id = serializers.SlugRelatedField(
                     queryset=Ethnicities.objects.filter(),
                     slug_field='id')
    physical_conflections_id = serializers.SlugRelatedField(
                               queryset=PhysicalConflections.objects.filter(),
                               slug_field='id')
    __fetishes = [
            {'fetishes_id': "1"},
            {'fetishes_id': "2"},
            ]
    fetishes = serializers.CharField(help_text=dumps(__fetishes))
    __sickness = [
            {'sickness_id': "1"},
            {'sickness_id': "2"},
            ]
    sickness = serializers.CharField(help_text=dumps(__sickness))
    __preference = [
            {'preference_id': "1"},
            {'preference_id': "2"},
            ]
    preference = serializers.CharField(help_text=dumps(__preference))
    __hobbies = [
            {'hobbies_id': "1"},
            {'hobbies_id': "2"},
            ]
    hobbies = serializers.CharField(help_text=dumps(__hobbies))
    weight = serializers.CharField()
    height = serializers.CharField()
    size_penis = serializers.CharField()
    latitude = serializers.CharField()
    longitude = serializers.CharField()
    birthday = serializers.DateField()


class SicknessUserSerializers(serializers.Serializer):

    __sickness = [
            {'sickness_id': "1", 'status': True},
            {'sickness_id': "2", 'status': True},
            ]
    sickness = serializers.CharField(help_text=dumps(__sickness))


class FetishesUserSerializers(serializers.Serializer):

    __fetishes = [
            {'fetishes_id': "1", 'status': True},
            {'fetishes_id': "2", 'status': False},
            ]
    fetishes = serializers.CharField(help_text=dumps(__fetishes))


class PreferenceUserSerializers(serializers.Serializer):

    __preference = [
            {'preference_id': "1", 'status': True},
            {'preference_id': "2", 'status': True},
            ]
    preference = serializers.CharField(help_text=dumps(__preference))


class HobbiesUserSerializers(serializers.Serializer):

    __hobbies = [
            {'hobbies_id': "1", 'status': True},
            {'hobbies_id': "2", 'status': False},
            ]
    hobbies = serializers.CharField(help_text=dumps(__hobbies))


class UpdateProfileSerializers(serializers.Serializer):

    username = serializers.CharField()
    first_name = serializers.CharField()
    last_name = serializers.CharField()
    password = serializers.CharField()
    confirm_password = serializers.CharField()
    email = serializers.EmailField()
    confirm_email = serializers.EmailField()
    city_id = serializers.SlugRelatedField(
              queryset=City.objects.filter(),
              slug_field='id')
    rol_sexual_id = serializers.SlugRelatedField(
                    queryset=Roles.objects.filter(),
                    slug_field='id')
    professions_id = serializers.SlugRelatedField(
                     queryset=Professions.objects.filter(),
                     slug_field='id')
    ethnicities_id = serializers.SlugRelatedField(
                     queryset=Ethnicities.objects.filter(),
                     slug_field='id')
    physical_conflections_id = serializers.SlugRelatedField(
                               queryset=PhysicalConflections.objects.filter(),
                               slug_field='id')
    weight = serializers.CharField()
    height = serializers.CharField()
    size_penis = serializers.CharField()
    latitude = serializers.CharField()
    longitude = serializers.CharField()
    birthday = serializers.DateField()


class CreateUSerAdminSerializers(serializers.Serializer):

    username = serializers.CharField()
    first_name = serializers.CharField()
    last_name = serializers.CharField()
    password = serializers.CharField()
    confirm_password = serializers.CharField()
    email = serializers.EmailField()
    confirm_email = serializers.EmailField()
    status = serializers.ChoiceField(choices=[('True'),
                                              ('False')])


class CreateUSerSerializers(serializers.Serializer):

    username = serializers.CharField()
    first_name = serializers.CharField()
    password = serializers.CharField()
    confirm_password = serializers.CharField()
    email = serializers.EmailField()
    confirm_email = serializers.EmailField()
    birthday = serializers.DateField()


class RecoverPasswordSerializers(serializers.Serializer):
    email = serializers.EmailField()


class StatusUserSerializers(serializers.Serializer):
    status = serializers.ChoiceField(choices=[('True'),
                                              ('False')])


class ChangePasswordSerializers(serializers.Serializer):

    password = serializers.CharField()
    confirm_password = serializers.CharField()


class ConfirmationSerializers(serializers.Serializer):

    token = serializers.CharField()


class DistanceSerializers(serializers.Serializer):

    latitude = serializers.CharField()
    longitude = serializers.CharField()


class FolderUserSerializers(serializers.Serializer):

    name = serializers.CharField()


class FolderImageSerializers(serializers.Serializer):

    __image = [
        "http://deimagen.mx/wp-content/uploads/2011/07/Imagen-Personal.jpg",
        "http://www.elciudadano.cl/wp-content/uploads/2017/01/demonio.jpg",
    ]
    # name = serializers.CharField()
    folder_id = serializers.SlugRelatedField(
                  queryset=Folder.objects.filter(),
                  slug_field='id')
    image = serializers.CharField(help_text=dumps(__image))


class ImageSerializers(serializers.Serializer):

    # name = serializers.CharField()
    folder_id = serializers.SlugRelatedField(
                  queryset=Folder.objects.filter(),
                  slug_field='id')


class ImageUsSerializers(serializers.Serializer):

    # name = serializers.CharField()
    image_id = serializers.SlugRelatedField(
                  queryset=FolderImageUser.objects.filter(),
                  slug_field='id')


class FavoriteSerializers(serializers.Serializer):

    # name = serializers.CharField()
    user_f_id = serializers.SlugRelatedField(
                  queryset=User.objects.filter(),
                  slug_field='id')


class PasswordChangeSerializers(serializers.Serializer):

    current = serializers.CharField()
    password = serializers.CharField()
    confirm_password = serializers.CharField()
