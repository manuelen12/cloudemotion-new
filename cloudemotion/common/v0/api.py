# Stdlib imports
from json import loads
# from requests import get
# Core Django imports
# from django.contrib.auth import get_user_model
# from django.core.cache import cache
# Third-party app imports
# Imports from your apps
# from django.contrib.auth import get_user_model
from cloudemotion.common.models import (Positions, Languajes)
from common.utils import Base
# from django.db.models import Q
# from django.db.models import Count
# User = get_user_model()


class Controller(Base):
    def __init__(self, request):
        Base.__init__(self)
        self.request = request
        self.error = {}
        self.result = []
        self.url_api = "http://"+self.request.META['HTTP_HOST']+"/api/v0/"

    def get_position(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        # __filters.update({"user_id": self.request.user.id})
        __search = self.request.GET.get('search')
        self.get_positions(__filters, __paginator, __ordening, __search)

    def get_positions(self, filters={}, paginator={}, ordening=(), search=None):

        __array = []
        __position = Positions.objects.filter(
            **filters).order_by(*ordening)
        for i in __position:
            __dict = {
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


    def get_languaje(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        # __filters.update({"user_id": self.request.user.id})
        __search = self.request.GET.get('search')
        self.get_languajes(__filters, __paginator, __ordening, __search)

    def get_languajes(self, filters={}, paginator={}, ordening=(), search=None):

        __array = []
        __languaje = Languajes.objects.filter(
            **filters).order_by(*ordening)
        for i in __languaje:
            __dict = {
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
