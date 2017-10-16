
# Stdlib imports
# Core Django imports
# Third-party app imports
from rest_framework import serializers
# from cloudemotion.common.models import Cities
# from cloudemotion.users.models import (User)
# from json import dumps
# from django import forms
# Imports from your apps
# from django.contrib.auth import get_user_model
# User = get_user_model()


class UsersSerializers(serializers.Serializer):

    username = serializers.EmailField()
    password = serializers.CharField()
