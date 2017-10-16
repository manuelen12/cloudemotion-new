# Stdlib imports
# from os import mkdir, path
from json import loads, dumps
# from shutil import copyfile

# Core Django imports
# from django.contrib.auth import authenticate
from django.contrib.auth import get_user_model
# from django.core.cache import cache
from rest_framework_jwt.settings import api_settings
from cloudemotion.users.models import UsersNationalities, UsersProfessions
from cloudemotion.curriculum.models import CoursesUser
# from django.core.cache import cache
# from datetime import datetime
# from django.db.models import Q
# from django.db.models import Count
# from django.core.files.storage import default_storage
# from django.core.files.base import ContentFile
# from heapq import merge
# Imports from your apps
# from cloudemotion.users.models import (User)
# from cloudemotion.common.models import (Cities)
from common.utils import Base
# from users.models import Peers
# from common.utils import ThreadDef
# from django.template.loader import render_to_sXtring
from django.db.models import Prefetch
jwt_payload_handler = api_settings.JWT_PAYLOAD_HANDLER
jwt_encode_handler = api_settings.JWT_ENCODE_HANDLER
Users = get_user_model()


class API(Base):
    def __init__(self, request):
        Base.__init__(self)
        self.request = request
        self.data = self.valid_data()
        self.error = {}
        self.result = []
        self.url_api = "http://"+self.request.META['HTTP_HOST']+"/api/v0"

    def valid_data(self):
        if self.request.method == "POST":
            __value = loads(dumps(self.request.data))
        if self.request.method == "GET":
            __value = loads(dumps(self.request.data))
        if self.request.method == "PUT":
            __value = loads(dumps(self.request.data))
        if self.request.method == "DELETE":
            __value = loads(dumps(self.request.data))
        print(__value)
        return __value

    def get_user(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')

        self.get_users(__filters, __paginator, __ordening, __search)

    def get_users(self, filters={}, paginator={}, ordening=(), search=None):
        __array = []
        __nationality = UsersNationalities.objects.select_related(
            "nationality")
        __profession = UsersProfessions.objects.select_related("profession")

        __course = CoursesUser.objects.select_related("institute", "course")

        user = Users.objects.select_related(
            "city", "city__state", "city__state__country",
            "position").prefetch_related(
                Prefetch(
                    "user_nat", queryset=__nationality, to_attr="user_nat2"),
                Prefetch(
                    "user_prof", queryset=__profession, to_attr="user_prof2"),
                Prefetch(
                    "c_user", queryset=__course, to_attr="c_user2")
            ).filter(
            **filters).order_by(*ordening)
        for i in user:
            __dict = {
                "id": i.id,
                "first_name": i.first_name,
                "last_name": i.last_name,
                "email": i.email,
                "position": {
                    "id": i.position.id,
                    "name": i.position.name,
                } if i.position_id else {},
                "city": {
                    "id": i.city.id,
                    "name": i.city.name,
                    "state": {
                        "id": i.city.state.id,
                        "name": i.city.state.name,
                        "country": {
                            "id": i.city.state.country.id,
                            "name": i.city.state.country.name,
                        }
                    }
                } if i.city_id else {},
                "image": i.image,
                "birthday": i.birthday,
                "phone": i.phone,
                "address": i.address,
                "gender": i.gender,
                "skype": i.skype,
                "twitter": i.twitter,
                "linkedin": i.linkedin,
                "youtube": i.youtube,
                "about_me": i.about_me,
                "status": i.status,
                "create_at": i.create_at,
                "user_nationality": [],
                "user_profession": [],
                "user_course": []
            }
            for e in i.user_nat2:
                __dict2 = {
                    "name": e.nationality.name
                }
                __dict["user_nationality"].append(__dict2)

            for e in i.user_prof2:
                __dict2 = {
                    "name": e.profession.name
                }
                __dict["user_profession"].append(__dict2)

            for e in i.c_user2:
                __dict2 = {
                    "institute": {
                        "name": e.institute.name,
                        "address": e.institute.address,
                    },
                    "course": {
                        "name": e.course.name,
                    },
                    "start_date": e.start_date,
                    "ending_date": e.ending_date,
                }
                __dict["user_course"].append(__dict2)

            print(__dict)
            __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
