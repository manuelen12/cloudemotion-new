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
from cloudemotion.curriculum.models import (CoursesUser,
                                            EducationsUser,
                                            LanguajesUser,
                                            Experiences,
                                            SkillsUser,
                                            Portfolios,
                                            UserLanguage,
                                            ExperienceLanguage,
                                            PortfolioLanguage)
from django.utils import translation
#from cloudemotion.common.models import Nationalities, Languajes
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
        # language de la cokkie
        short = self.request.session[translation.LANGUAGE_SESSION_KEY]
        __array = []
        # consulta a la base de datos
        __about = UserLanguage.objects.select_related(
            "language").filter(language__short=short)

        __observatione = ExperienceLanguage.objects.select_related(
            "language").filter(language__short=short)

        __observationp = PortfolioLanguage.objects.select_related(
            "language").filter(language__short=short)

        __nationality = UsersNationalities.objects.select_related(
            "nationality")
        __profession = UsersProfessions.objects.select_related("profession")

        __course = CoursesUser.objects.select_related("institute", "course")

        __education = EducationsUser.objects.select_related(
            "institute", "education")

        __languaje = LanguajesUser.objects.select_related(
            "languaje")

        __experience = Experiences.objects.select_related(
            "company", "position").prefetch_related(Prefetch(
                    "l_exp", queryset=__observatione, to_attr="l_exp2"))

        __skill = SkillsUser.objects.select_related(
            "skill")

        __portfolio = Portfolios.objects.select_related(
            "classification").prefetch_related(Prefetch(
                    "l_por", queryset=__observationp, to_attr="l_por2"))

        user = Users.objects.select_related(
            "city", "city__state", "city__state__country",
            "position").prefetch_related(
            #filtro de la consulta
                Prefetch(
                    "user_nat", queryset=__nationality, to_attr="user_nat2"),
                Prefetch(
                    "user_prof", queryset=__profession, to_attr="user_prof2"),
                Prefetch(
                    "c_user", queryset=__course, to_attr="c_user2"),
                Prefetch(
                    "edu_user", queryset=__education, to_attr="edu_user2"),
                Prefetch(
                    "l_user", queryset=__languaje, to_attr="l_user2"),
                Prefetch(
                    "ex_user", queryset=__experience, to_attr="ex_user2"),
                Prefetch(
                    "s_user", queryset=__skill, to_attr="s_user2"),
                Prefetch(
                    "p_user", queryset=__portfolio, to_attr="p_user2"),
                Prefetch(
                    "lan_user", queryset=__about, to_attr="about2"),
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
                "about_me": i.about2[0] if i.about2 else "",
                "status": i.status,
                "create_at": i.create_at,
                "user_nationality": [],
                "user_profession": [],
                "user_course": [],
                "user_education": [],
                "user_language": [],
                "user_experience": [],
                "user_skill": [],
                "user_portfolio": [],
                "idiom": short,
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

            for e in i.edu_user2:
                __dict2 = {
                    "institute": {
                        "name": e.institute.name,
                        "address": e.institute.address,
                    },
                    "education": {
                        "name": e.education.name,
                    },
                    "start_date": e.start_date,
                    "ending_date": e.ending_date,
                }
                __dict["user_education"].append(__dict2)

            for e in i.l_user2:
                __dict2 = {
                    "level": {
                        "id": e.level,
                        "name": e.get_level_display()
                    },
                    "name": e.languaje.name
                }
                __dict["user_language"].append(__dict2)

            for e in i.ex_user2:
                __dict2 = {
                    "company": {
                        "name": e.company.name,
                        "address": e.company.address,
                    },
                    "position": {
                        "name": e.position.name,
                    },
                    "description": e.l_exp2[0].description if e.l_exp2 else "",
                    "start_date": e.start_date,
                    "ending_date": e.ending_date,
                }
                __dict["user_experience"].append(__dict2)

            for e in i.s_user2:
                __dict2 = {
                    "level": {
                        "id": e.level,
                        "name": e.get_level_display()
                    },
                    "name": e.skill.name
                }
                __dict["user_skill"].append(__dict2)

            for e in i.p_user2:
                __dict2 = {
                    "classification": {
                        "name": e.classification.name,
                        "category": e.classification.category,
                    },
                    "name": e.name,
                    "image": e.image,
                    "description": e.l_por2[0].description if e.l_por2 else "",
                }
                __dict["user_portfolio"].append(__dict2)

            print(__dict)
            __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
