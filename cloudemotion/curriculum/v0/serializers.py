
# Stdlib imports
# Core Django imports
# Third-party app imports
from rest_framework import serializers
# from gaver.common.models import City
# from json import dumps
# from django import forms
# Imports from your apps
# from django.contrib.auth.models import User
from cloudemotion.curriculum.models import (
                                        Classifications,
                                        Portfolios,
                                        )


class PortfolioSerializer(serializers.ModelSerializer):
    class Meta:
        model = Portfolios
        fields = '__all__'


class ClassificationSerializer(serializers.ModelSerializer):
    class Meta:
        model = Classifications
        fields = '__all__'
