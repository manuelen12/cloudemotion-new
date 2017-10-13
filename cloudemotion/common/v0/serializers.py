# Stdlib imports
# Core Django imports
# Third-party app imports
from rest_framework import serializers
# Imports from your apps
# from json import dumps
# from django.contrib.auth.models import User
from gaver.common.models import (Position,
                                 Country,
                                 City,
                                 State
                                 )


class PositionSerializers(serializers.ModelSerializer):
    class Meta:
        model = Position
        fields = '__all__'


class CountrySerializers(serializers.ModelSerializer):
    class Meta:
        model = Country
        fields = ('id', 'name')


class StateSerializers(serializers.ModelSerializer):
    class Meta:
        model = State
        fields = ('id', 'name', 'country')


class CitySerializers(serializers.ModelSerializer):
    class Meta:
        model = City
        fields = ('id', 'name', 'state')


class UploadSerializers(serializers.Serializer):

    file = serializers.FileField(required=True)
