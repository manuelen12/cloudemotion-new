# Stdlib imports
from json import loads
# from requests import get
# Core Django imports
# from django.contrib.auth import get_user_model
# from django.core.cache import cache
# Third-party app imports
# Imports from your apps
from django.contrib.auth import get_user_model
from gaver.common.models import (Country,
                                 State,
                                 City
                                 )
from common.utils import Base
# from django.db.models import Q
from django.db.models import Count
# from json import loads
User = get_user_model()


class Controller(Base):
    def __init__(self, request):
        Base.__init__(self)
        self.request = request
        self.error = {}
        self.result = []
        self.url_api = "http://"+self.request.META['HTTP_HOST']+"/api/v0/"

    def get_country(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')
        self.get_countrys(__filters, __paginator, __search, __ordening)

    def get_countrys(self, filters={}, paginator={}, ordening=(), search=None):
        __dict = {}
        __dict2 = {}
        if self.request.user.level == 2:
            filters.update({"status": True})
        general = Country.objects.filter(**filters)[:30]
        __general = User.objects.filter(
            **filters).values(
                "city__state__country__name",
                "city__state__country_id").annotate(Count("city__state__country_id"))

        [__dict.update({i.get('city__state__country_id'): i.get("city__state__country_id__count")}) for i in __general]
        [__dict2.update({i.get('city__state__country_id'): i.get("city__state__country_id")}) for i in __general]
        print(__dict2)
        __array = []
        for s in general:
            __dict2 = {
               "id": s.id,
               "name": s.name,
               "total_user": __dict.get((s.id), 0),
               "total_states": __dict2.get((s.id), 0),
            }
            __array.append(__dict2)
        print(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
            print(self.result)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
        return __array

    def get_state(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')
        self.get_states(__filters, __paginator, __search, __ordening)

    def get_states(self, filters={}, paginator={}, ordening=(), search=None):
        __dict = {}
        __dict2 = {}
        if self.request.user.level == 2:
            filters.update({"status": True, "country__status": True})
        general = State.objects.filter(**filters)[:30]
        __general = User.objects.values(
                "city__state__name",
                "city__state_id", "city__state").annotate(Count("city__state_id"))

        [__dict.update({i.get('city__state_id'): i.get("city__state_id__count")}) for i in __general]
        [__dict2.update({i.get('city__state'): i.get("city__state")}) for i in __general]
        print(__dict2)
        __array = []
        for s in general:
            __dict2 = {
               "id": s.id,
               "name": s.name,
               "country": {
                    "id": s.country_id,
                    "name": s.country.name,
               },
               "total_user": __dict.get((s.id), 0),
               "total_city": __dict2.get((s.id), 0),
            }
            __array.append(__dict2)
        print(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
            print(self.result)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
        return __array
        # __array = []
        # if pk:
        #     filters.update({'pk': pk})
        # filters.update({"status": True})
        # if search:
        #     __p = User.objects.filter(
        #         **filters).filter(
        #         Q(name__icontains=search) |
        #         Q(id__icontains=search)).values(
        #         "city__state_id",
        #         "city__state__name").annotate(Count("city__state_id")).exclude(city__state_id__count=0)
        # else:
        #     __p = User.objects.filter(
        #         **filters).values(
        #         "city__state__name",
        #         "city__state_id").annotate(Count("city__state_id")).exclude(city__state_id__count=0)
        # for i in __p:
        #     __dict = {
        #         "id": i.get("city__state_id"),
        #         "name": i.get("city__state__name"),
        #         }
        #     __dict.update({"total_user": i.get("city__state_id__count", 0)})
        #     __dict.update({"total_city": i.get("city__state_id", 0)})
        #     __array.append(__dict)
        # if not filters.get('pk'):
        #     self.paginator(__array, paginator)
        #     print(self.result)
        # else:
        #     if not __array:
        #         self.result = {"result": "empty"}
        #         return
        #     self.result = __array[0]
        # return __array

    def get_city(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')
        self.get_citys(__filters, __paginator, __search, __ordening)

    def get_citys(self, filters={}, paginator={}, ordening=(), search=None):
        __dict = {}
        if self.request.user.level == 2:
            filters.update({"status": True, "state__country__status": True})
        general = City.objects.filter(**filters)[:30]
        __general = User.objects.values(
                "city__name",
                "city_id").annotate(Count("city_id"))

        [__dict.update({i.get('city_id'): i.get("city_id__count")}) for i in __general]
        __array = []
        for s in general:
            __dict2 = {
               "id": s.id,
               "name": s.name,
               "state": {
                    "id": s.state_id,
                    "name": s.state.name,
               },
               "total_user": __dict.get((s.id), 0)
            }
            __array.append(__dict2)
        print(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
            print(self.result)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
        return __array

    def get_countries(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')
        self.get_countriess(__filters, __paginator, __search, __ordening)

    def get_countriess(self, filters={}, paginator={}, ordening=(), search=None):
        __dict = {}
        __dict2 = {}
        if self.request.user.level == 2:
            filters.update({"status": True})
        general = Country.objects.filter(**filters)[:30]
        __array = []
        for s in general:
            __dict2 = {
               "id": s.id,
               "name": s.name,
               "status": s.status
            }
            __array.append(__dict2)
        print(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
            print(self.result)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
        return __array

    def get_states_app(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')
        self.get_statess(__filters, __paginator, __search, __ordening)

    def get_statess(self, filters={}, paginator={}, ordening=(), search=None):
        __dict = {}
        __dict2 = {}
        if self.request.user.level == 2:
            filters.update({"status": True, "country__status": True})
        general = State.objects.filter(**filters)[:30]
        __array = []
        for s in general:
            __dict2 = {
               "id": s.id,
               "name": s.name,
               "country": {
                    "id": s.country_id,
                    "name": s.country.name,
               }
            }
            __array.append(__dict2)
        print(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
            print(self.result)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
        return __array

    def get_cities(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')
        self.get_citiess(__filters, __paginator, __search, __ordening)

    def get_citiess(self, filters={}, paginator={}, ordening=(), search=None):
        if self.request.user.level == 2:
            filters.update({"status": True, "state__country__status": True})
        general = City.objects.filter(**filters)[:30]
        __array = []
        for s in general:
            __dict2 = {
               "id": s.id,
               "name": s.name,
               "state": {
                    "id": s.state_id,
                    "name": s.state.name,
               }
            }
            __array.append(__dict2)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
            print(self.result)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
        return __array
