# Stdlib imports
# Core Django imports
# Third-party app imports
from rest_framework import serializers
# Imports from your apps
# from json import dumps
# from django.contrib.auth.models import User
from cloudemotion.common.models import (
    Positions, Countries, Cities, States
)


class PositionSerializers(serializers.ModelSerializer):
    class Meta:
        model = Positions
        fields = '__all__'


class CountrySerializers(serializers.ModelSerializer):
    class Meta:
        model = Countries
        fields = ('id', 'name')


class StateSerializers(serializers.ModelSerializer):
    class Meta:
        model = States
        fields = ('id', 'name', 'country')


class CitySerializers(serializers.ModelSerializer):
    class Meta:
        model = Cities
        fields = ('id', 'name', 'state')


class UploadSerializers(serializers.Serializer):

    file = serializers.FileField(required=True)
