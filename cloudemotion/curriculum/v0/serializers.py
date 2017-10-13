
# Stdlib imports
# Core Django imports
# Third-party app imports
from rest_framework import serializers
# from gaver.common.models import City
from gaver.places.models import (Category, Places)
from json import dumps
# from django import forms
# Imports from your apps
# from django.contrib.auth.models import User


class CategorySerializer(serializers.ModelSerializer):
    class Meta:
        model = Category
        fields = ('id', 'name')


class PlacesSerializers(serializers.Serializer):

    __image = [
            {'image': "http://deimagen.mx/wp-content/uploads/2011/07/Imagen-Personal.jpg"},
            {'image': "http://www.elciudadano.cl/wp-content/uploads/2017/01/demonio.jpg"},
            ]
    name = serializers.CharField()
    description = serializers.CharField()
    latitude = serializers.CharField()
    longitude = serializers.CharField()
    category_id = serializers.SlugRelatedField(
                  queryset=Category.objects.filter(),
                  slug_field='id')
    image = serializers.CharField(help_text=dumps(__image))


class CommentarySerializers(serializers.Serializer):

    commentary = serializers.CharField()
    places_id = serializers.SlugRelatedField(
                  queryset=Places.objects.filter(),
                  slug_field='id')


class CommentaryUpdateSerializers(serializers.Serializer):

    commentary = serializers.CharField()


class PlacesImageSerializers(serializers.Serializer):

    __image = [
          {'image': "http://deimagen.mx/wp-content/uploads/2011/07/Imagen-Personal.jpg"},
            ]
    places_id = serializers.SlugRelatedField(
                  queryset=Places.objects.filter(),
                  slug_field='id')
    image = serializers.CharField(help_text=dumps(__image))


class PlacesFavoriteSerializers(serializers.Serializer):

    places_id = serializers.SlugRelatedField(
                  queryset=Places.objects.filter(),
                  slug_field='id')
