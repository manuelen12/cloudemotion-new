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
from django.db.models import Q
from django.db.models import Count
# from django.db.models import Count
# Imports from your apps
# from gaver.users.models import (Fetishes)
# from gaver.common.models import (City)
from gaver.places.models import (Category,
                                 Places, PlacesImage,
                                 PlacesCommentaryUser,
                                 PlacesFavouriteUser)
from common.utils import Base
# from users.models import Peers
# from common.utils import ThreadDef
# from django.template.loader import render_to_string
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

    def list_category(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')

        self.list_categorys(__filters, __paginator, __search, __ordening)

    def list_categorys(self, filters={}, paginator={}, ordening=(), search=None):
        __dict = {}
        general = Category.objects.filter(**filters)
        __general = Places.objects.filter(
            **filters).values(
            "category__name",
            "category_id").annotate(Count("category_id"))

        [__dict.update({i.get('category_id'): i.get("category_id__count")}) for i in __general]
        __array = []
        for s in general:
            __dict2 = {
               "id": s.id,
               "name": s.name,
               "total_places": __dict.get((s.id), 0)
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

    def list_commentary(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')

        self.list_commentarys(__filters, __paginator, __search, __ordening)

    def list_commentarys(self, filters={}, paginator={}, ordening=(), search=None):
        __array = []
        # filters.update({"status": True})
        if search:
            __p = PlacesCommentaryUser.objects.filter(
                **filters).filter(
                Q(name__icontains=search) |
                Q(id__icontains=search))
        else:
            __p = PlacesCommentaryUser.objects.filter(
                **filters)
        for i in __p:
            __dict = {
                "id": i.id,
                "commentary": i.commentary,
                "status": i.status,
                "user_dict": {
                    "user_id": i.user_id,
                    "user_name": i.user.name,
                },
                "places_dict": {
                    "id": i.places_id,
                    "name": i.places.name,
                    "description": i.places.description,
                    "latitude": i.places.latitude,
                    "longitude": i.places.longitude,
                    "status": i.places.status,
                    "category_id": i.places.category_id,
                    "category_dict": {
                        "id": i.places.category_id,
                        "name": i.places.category.name
                    },
                },
                }
            __array.append(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
            print(self.result)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
        return __array

    def list_places(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')

        self.list_placess(__filters, __paginator, __search, __ordening)

    def list_placess(self, filters={}, paginator={}, ordening=(), search=None):
        __dict = {}
        general = Places.objects.filter(**filters)
        __general = PlacesCommentaryUser.objects.filter(
            **filters).values(
            "user_id").annotate(Count("user_id"))

        [__dict.update({i.get('user_id'): i.get("user_id__count")}) for i in __general]
        __array = []
        for s in general:
            __dict2 = {
               "id": s.id,
               "name": s.name,
               "total_comment": __dict.get((s.id), 0),
               "description": s.description,
               "latitude": s.latitude,
               "longitude": s.longitude,
               "status": s.status,
               "category_id": s.category_id,
               "category_dict": {
                    "id": s.category_id,
                    "name": s.category.name
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

    def list_places_all(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')

        self.list_placess_all(__filters, __paginator, __search, __ordening)

    def list_placess_all(self, filters={}, paginator={}, ordening=(), search=None):
        __array = []
        if search:
            __p = Places.objects.filter(
                **filters).filter(
                Q(name__icontains=search) |
                Q(id__icontains=search))
        else:
            __p = Places.objects.filter(
                **filters).prefetch_related("places_image", "places_commentary_user")
        for i in __p:
            __dict = {
                "id": i.id,
                "name": i.name,
                "description": i.description,
                "latitude": i.latitude,
                "longitude": i.longitude,
                "status": i.status,
                "category_id": i.category_id,
                "category_dict": {
                    "id": i.category_id,
                    "name": i.category.name
                },
                "image": [],
                "commentary_user": [],
                }
            for e in i.places_image.all():
                    __dict1 = {
                        "id": e.id,
                        "image": e.image,
                        "status": e.status
                    }
                    __dict['image'].append(__dict1)
            for e in i.places_commentary_user.all():
                    __dict2 = {
                        "id": e.id,
                        "user_id": e.user_id,
                        "user_name": e.user.name,
                        "commentary": e.commentary,
                        "status": e.status
                    }
                    __dict['commentary_user'].append(__dict2)
            __array.append(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
            print(self.result)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
        return __array

    def valid_register_places(self, kwargs):
        __valid = [
            "name",
            "description",
            "latitude",
            "longitude",
            "category_id",
            ]
        if not self._list_basic_info(kwargs, __valid):
            return
        if not Category.objects.filter(id=kwargs.get("category_id")):
            self._error_info("Category", "does not exist")
            return
        if Places.objects.filter(latitude=kwargs.get("latitude"),
                                 longitude=kwargs.get("longitude")):
            self._error_info("Places", "already exist")
            return
        if self.data["image"]:
            try:
                self.data['image'] = loads(self.data['image'])
            except:
                self._error_info("image", "format incorrect")
                return
        return True

    def create_places(self):
        print("Post: " + str(self.request.data))
        if not self.valid_register_places(self.data):
            return
        self.export_attr(Places, self.data)
        create = Places.objects.create(**self.values)
        if self.data["image"]:
            for i in self.data['image']:
                self.export_attr(PlacesImage, i)
                self.values["places_id"] = create.id
                PlacesImage.objects.create(**self.values)
        self.result = self.list_places(create.id)

    def delete_places(self, pk):
        self.data = self.request.data
        if not Places.objects.filter(id=pk, status=True):
            self._error_info("Places", "does not exit")
            return
        delete = Places.objects.get(id=pk)
        delete.status = False
        delete.save()
        x = self.list_places(pk)
        self.result = x

    def create_comment(self):
        __valid = [
            "commentary",
            "places_id",
            ]
        if not self._list_basic_info(self.data, __valid):
            return
        self.export_attr(PlacesCommentaryUser, self.data)
        self.values["user_id"] = self.request.user.id
        create = PlacesCommentaryUser.objects.create(**self.values)
        self.result = self.list_commentary(create.id)

    def update_comment(self, pk):
        __valid = [
            "commentary",
            ]
        if not self._list_basic_info(self.data, __valid):
            return
        update = PlacesCommentaryUser.objects.filter(id=pk, user_id=self.request.user.id, status=True)
        if not update:
            self._error_info("Commentary User", "does not exit")
            return
        update[0].commentary = self.data.get("commentary")
        update[0].save()
        x = self.list_commentary(pk)
        self.result = x

    def delete_commentary(self, pk):
        self.data = self.request.data
        if not PlacesCommentaryUser.objects.filter(id=pk, status=True,
                                                   user_id=self.request.user.id):
            self._error_info("Commentary User", "does not exit")
            return
        delete = PlacesCommentaryUser.objects.get(id=pk, user_id=self.request.user.id)
        delete.status = False
        delete.save()
        x = self.list_commentary(pk)
        self.result = x

    def valid_register_places_image(self, kwargs):
        __valid = [
            "places_id",
            "image",
            ]
        if not self._list_basic_info(kwargs, __valid):
            return
        if not Places.objects.filter(id=self.data.get("places_id")):
            self._error_info("Places", "does not exist")
            return
        if self.data["image"]:
            try:
                self.data['image'] = loads(self.data['image'])
            except:
                self._error_info("image", "format incorrect")
                return
        return True

    def create_places_image(self):
        print("Post: " + str(self.request.data))
        if not self.valid_register_places_image(self.data):
            return
        if self.data["image"]:
            for i in self.data['image']:
                self.export_attr(PlacesImage, i)
                self.values["places_id"] = self.data.get("places_id")
                PlacesImage.objects.create(**self.values)
        self.result = self.list_places_all(self.data.get("places_id"))

    def delete_places_image(self, pk):
        self.data = self.request.data
        if not PlacesImage.objects.filter(id=pk, status=True):
            self._error_info("Places Image", "does not exit")
            return
        PlacesImage.objects.get(id=pk).delete()
        self.result = "delete succefull"

    def get_places_favorite(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})

        self.get_places_favorites(__filters, __paginator, __ordening)

    def get_places_favorites(self, filters={}, paginator={}, ordening=()):
        __array = []
        if self.request.user.level == 2:
            filters.update({"user_id": self.request.user.id})
        favorite = PlacesFavouriteUser.objects.filter(
          **filters)
        for i in favorite:
            __dict = {
                "id": i.id,
                "status": i.status,
                "create_at": i.create_at,
                "places_favorite": {
                    "id": i.places_id,
                    "name": i.places.name,
                    "image": i.places.image,
                    "description": i.places.description,
                    "latitude": i.places.latitude,
                    "longitude": i.places.longitude,
                    "status": i.places.status,
                    "category_dict": {
                        "id": i.places.category_id,
                        "name": i.places.category.name
                    },
                }
            }
            __array.append(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array

    def valid_places_favorite(self, kwargs):
        __valid = [
            "places_id",
            ]
        if not self._list_basic_info(kwargs, __valid):
            return
        if not Places.objects.filter(id=kwargs.get("places_id")):
            self._error_info("Places", "do not exist places_id")
            return
        if PlacesFavouriteUser.objects.filter(
                places_id=kwargs.get("places_id"),
                user_id=self.request.user.id):
            self._error_info("Places Favourite",
                             "already exist")
            return
        return True

    def create_favorite_places(self):
        if not self.valid_places_favorite(self.data):
            return
        self.export_attr(PlacesFavouriteUser, self.data)
        self.values["user_id"] = self.request.user.id
        self.values["places_id"] = self.data.get("places_id")
        create = PlacesFavouriteUser.objects.create(**self.values)
        self.get_places_favorite(create.id)

    def delete_favorite_places(self, pk):
        self.data = self.request.data
        if not PlacesFavouriteUser.objects.filter(
                id=pk,
                user_id=self.request.user.id):
            self._error_info("PlacesFavouriteUser",
                             "id not exist")
            return
        PlacesFavouriteUser.objects.get(
            id=pk,
            user_id=self.request.user.id).delete()
        self.get_places_favorite(pk)
