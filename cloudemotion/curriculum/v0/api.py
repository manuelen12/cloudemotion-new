# Stdlib imports
# from os import mkdir, path
from json import loads, dumps
# from shutil import copyfile

# Core Django imports
# from django.contrib.auth import authenticate
from django.contrib.auth import get_user_model
# from django.core.cache import cache
from rest_framework_jwt.settings import api_settings
# from django.core.cache import cache
# from datetime import datetime
# from django.db.models import Q
# from django.db.models import Count
# from django.db.models import Count
# Imports from your apps
# from gaver.users.models import (Fetishes)
# from gaver.common.models import (City)
from django.utils.translation import ugettext_lazy as _
from cloudemotion.curriculum.models import (Classifications,
                                            Portfolios,
                                            PortfolioSkill)
from common.utils import Base
# from users.models import Peers
# from common.utils import ThreadDef
# from django.template.loader import render_to_string
from django.db.models import Prefetch
jwt_payload_handler = api_settings.JWT_PAYLOAD_HANDLER
jwt_encode_handler = api_settings.JWT_ENCODE_HANDLER

User = get_user_model()


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

    def get_classification(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        # __filters.update({"user_id": self.request.user.id})
        __search = self.request.GET.get('search')
        self.get_classifications(__filters, __paginator, __ordening, __search)

    def get_classifications(self, filters={}, paginator={}, ordening=(), search=None):

        __array = []
        __classification = Classifications.objects.filter(
            **filters).order_by(*ordening)
        for i in __classification:
            __dict = {
                "id": i.id,
                "name": i.name,
                "status": i.status,
                "create_at": i.create_at,
            }
            __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]

    def get_portfolio(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        # __filters.update({"user_id": self.request.user.id})
        __search = self.request.GET.get('search')
        self.get_portfolios(__filters, __paginator, __ordening, __search)


    def get_portfolios(self, filters={}, paginator={}, ordening=(), search=None):

        __array = []
        __developed = PortfolioSkill.objects.select_related(
            "skill", "portfolio")

        __portfolio = Portfolios.objects.select_related(
            "company", "classification"
            ).prefetch_related(

             Prefetch(
                    "s_por", queryset=__developed, to_attr="s_por2"),
            ).filter(
            **filters).order_by(*ordening)
        for i in __portfolio:
            __dict = {
                "id": i.id,
                "name": i.name,
                "company": {
                    "id": i.company.id,
                    "name": i.company.name,
                    "responsable": i.company.responsable,
                    "image": i.company.image,
                },
                "classification": {
                    "id": i.classification.id,
                    "name": i.classification.name,
                    "category": i.classification.category,
                },
                "image": i.image,
                "url": i.url,
                "year": i.year,
                "developed": [],
                "status": i.status,
                "create_at": i.create_at,
            }
            for e in i.s_por2:
                __dict2 = {
                    "name": _(e.skill.name)
                }
                __dict["developed"].append(__dict2)
            print(__dict)
            __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
