import random
# Stdlib imports
# from os import mkdir, path
from json import loads, dumps
# from shutil import copyfile

# Core Django imports
# from django.contrib.auth import authenticate
from django.utils.translation import ugettext_lazy as _
from django.contrib.auth import get_user_model
from common.utils import ThreadDef
from django.template.loader import render_to_string
# from django.core.cache import cache
from rest_framework_jwt.settings import api_settings
from cloudemotion.users.models import (UsersNationalities,
                                       UsersProfessions,
                                       )
from cloudemotion.curriculum.models import (CoursesUser,
                                            EducationsUser,
                                            LanguajesUser,
                                            Experiences,
                                            SkillsUser,
                                            Portfolios,
                                            UserLanguage,
                                            ExperienceLanguage,
                                            PortfolioUser,
                                            PortfolioSkill,
                                            PortfolioLanguage)
from django.utils import translation
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
            "classification", "company").prefetch_related(Prefetch(
                    "l_por", queryset=__observationp, to_attr="l_por2"),
                    "s_por"
            )

        __portfuser = PortfolioUser.objects.select_related(
            "user", "portfolio")

        # x = __portfolio
        # import ipdb; ipdb.set_trace()
        user = Users.objects.select_related(
            "city", "city__state", "city__state__country",
            "position").prefetch_related(

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
                Prefetch(
                    "port_us", queryset=__portfuser, to_attr="port_us2"),
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
                "curriculum": i.curriculum,
                "about_me": i.about2[0].about_me if i.about2 else "",
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
                "portfolio_user": [],
                "idiom": short,
            }
            for e in i.user_nat2:
                __dict2 = {
                    "name": _(e.nationality.name)
                }
                __dict["user_nationality"].append(__dict2)

            for e in i.user_prof2:
                __dict2 = {
                    "name": _(e.profession.name)
                }
                __dict["user_profession"].append(__dict2)

            for e in i.c_user2:
                __dict2 = {
                    "institute": {
                        "name": e.institute.name,
                        "address": e.institute.address,
                    },
                    "course": {
                        "name": _(e.course.name)
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
                        "name": _(e.education.name),
                    },
                    "start_date": e.start_date,
                    "ending_date": e.ending_date,
                }
                __dict["user_education"].append(__dict2)

            for e in i.l_user2:
                __dict2 = {
                    "level": {
                        "id": e.level,
                        "name": _(e.get_level_display())
                    },
                    "name": _(e.languaje.name)
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
                    "name": _(e.skill.name)
                }
                __dict["user_skill"].append(__dict2)

            for e in i.p_user2:
                __dict2 = {
                    "id": e.id,
                    "name": e.name,
                    "image": e.image,
                    "url": e.url,
                    "description": e.l_por2[0].description if e.l_por2 else "",
                    "year": e.year,
                    "developed": [],
                    "classification": {
                        "id": e.classification.id,
                        "name": _(e.classification.name),
                        "category": e.classification.category,
                    },
                    "company": {
                        "id": e.company.id,
                        "name": _(e.company.name),
                        "responsable": e.company.responsable,
                    },
                }
                # import ipdb; ipdb.set_trace()
                # import ipdb; ipdb.set_trace()
                for z in e.s_por.all():
                    __dict3 = {
                        "id": z.skill.id,
                        "name": _(z.skill.name),
                    }
                    __dict2["developed"].append(__dict3)
                __dict["user_portfolio"].append(__dict2)

                for e in i.port_us2:
                    __dict2 = {
                        "id_portf": e.portfolio.id,
                        "name": _(e.portfolio.name),
                        "company": {
                            "id": e.portfolio.company.id,
                            "name": e.portfolio.company.name,
                            "responsable": e.portfolio.company.responsable,
                            "image": e.portfolio.company.image,
                        },
                        "classification": {
                            "id": e.portfolio.classification.id,
                            "name": e.portfolio.classification.name,
                            "category": e.portfolio.classification.category,
                        },
                        "screenshot": e.portfolio.screenshot,
                        "image": e.portfolio.image,
                        "url": e.portfolio.url,
                        "year": e.portfolio.year,
                    }
                    __dict["portfolio_user"].append(__dict2)

            print(__dict)
            __array.append(__dict)
        random.shuffle(__array)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]


    # def valid_send_contacts(self, kwargs):
    #     __valid = ['name', 'email', 'message']
    #     if not self._list_basic_info(kwargs, __valid):
    #         return

    #     return True

    # def client_to_contacts(self):
    #     self.data = self.request.data
    #     print(self.data)
    #     if not self.valid_send_contacts(self.data):
    #         return
    #     self.export_attr(Contacts, self.data)
    #     create = Contacts.objects.create(**self.values)
    #     # self.get_contacts(create.id)
    #     rendered_client = render_to_string(
    #         'message.html', {
    #             "name": self.data.get('name'),
    #             "numero": create.id})

    #     __start = ThreadDef(
    #         self.send_mail, *[self.data.get('email'),
    #                           "Autorespuesta CloudEmotion", rendered_client])
    #     # self.result = ('Su mensaje se enviado con exito!')
    #     __start.start()
    #     rendered_company = render_to_string(
    #         'autorequest_company.html', {
    #             "name": self.data.get('name'),
    #             "email": self.data.get('email'),
    #             "mensaje": self.data.get('message'),
    #             "numero": create.id})
    #     __start = ThreadDef(
    #         self.send_mail, *['cloudemotioninfo@gmail.com',
    #                           "Recepcion de Falla CloudEmotion", rendered_company])
    #     __start.start()
    #     self.result = create.id

    def valid_send_contact(self, kwargs):
        if not self._list_basic_info(kwargs, ["name", "email", "user_id", "message"]):
            return

        if not self.list_only_string(kwargs, ["name"]):
            return

        if not self._email(kwargs["email"]):
            return
        return True

    def send_contact(self):
        if not self.valid_send_contact(self.data):
            return

        html = render_to_string(
            'message.html', {
                "name": self.data.get('name'),
                "email": self.data.get('email'),
                "user_id": self.data.get('user_id'),
                "message": self.data.get('message')})

        __start = ThreadDef(
            self.send_mail, *["email",
                              "Contactanos de CloudEmotion", html])
        __start.start()
        self.result = {"result": "good"}

    # def get_portf_user(self, pk=None):
    #     __filters = loads(self.request.GET.get('filters', "{}"))
    #     __paginator = loads(self.request.GET.get('paginator', "{}"))
    #     __ordening = loads(self.request.GET.get('ordening', "[]"))
    #     if pk:
    #         __filters.update({"pk": pk})
    #     __search = self.request.GET.get('search')

    #     self.get_portf_users(__filters, __paginator, __ordening, __search)

    # def get_portf_users(self, filters={}, paginator={}, ordening=(), search=None):
    #     # language de la cokkie
    #     short = self.request.session[translation.LANGUAGE_SESSION_KEY]
    #     __array = []
    #     # consulta a la base de datos

    #     __portfuser = PortfolioUser.objects.select_related(
    #         "user", "portfolio")

    #     __portfolio = Users.objects.select_related(
    #         ).prefetch_related(

    #          Prefetch(
    #                 "port_us", queryset=__portfuser, to_attr="port_us2"),
    #         ).filter(
    #         **filters).order_by(*ordening)
    #     for i in __portfolio:
    #         __dict = {
    #             "id_user": i.id,
    #             "first_name": i.first_name,
    #             "last_name": i.last_name,
    #             "email": i.email,
    #             "portfuser": [],
    #             "status": i.status,
    #             "create_at": i.create_at,
    #         }
    #         for e in i.port_us2:
    #             __dict2 = {
    #                 "id_portf": e.portfolio.id,
    #                 "name": _(e.portfolio.name),
    #                 "company": {
    #                     "id": e.portfolio.company.id,
    #                     "name": e.portfolio.company.name,
    #                     "responsable": e.portfolio.company.responsable,
    #                     "image": e.portfolio.company.image,
    #                 },
    #                 "classification": {
    #                     "id": e.portfolio.classification.id,
    #                     "name": e.portfolio.classification.name,
    #                     "category": e.portfolio.classification.category,
    #                 },
    #                 "screenshot": e.portfolio.screenshot,
    #                 "image": e.portfolio.image,
    #                 "url": e.portfolio.url,
    #                 "year": e.portfolio.year,
    #             }
    #             __dict["portfuser"].append(__dict2)
    #         print(__dict)
    #         __array.append(__dict)
    #         # random.shuffle(__array)
    #     if not filters.get('pk'):
    #         self.paginator(__array, paginator)
    #     else:
    #         if not __array:
    #             self.result = {"result": "empty"}
    #             return
    #         self.result = __array[0]
