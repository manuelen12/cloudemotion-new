
# Stdlib imports
# Core Django imports
# Third-party app imports
from rest_framework import serializers
# from cloudemotion.common.models import Cities
# from cloudemotion.users.models import (User)
# from json import dumps
# from django import forms
# Imports from your apps
from django.contrib.auth import get_user_model
User = get_user_model()


class ContactSerializer(serializers.Serializer):
    name = serializers.CharField()
    email = serializers.EmailField()
    user_id = serializers.SlugRelatedField(
        queryset=User.objects.filter(status=True), slug_field='id')
    subject = serializers.CharField()
    message = serializers.CharField()


class UsersSerializers(serializers.Serializer):

    username = serializers.EmailField()
    password = serializers.CharField()
