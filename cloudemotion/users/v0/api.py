# Stdlib imports
# from os import mkdir, path
from json import loads, dumps
# from shutil import copyfile

# Core Django imports
from django.contrib.auth import authenticate
from django.contrib.auth import get_user_model
# from django.core.cache import cache
from rest_framework_jwt.settings import api_settings
from django.core.cache import cache
from datetime import datetime
from django.db.models import Q
from django.db.models import Count
# from django.core.files.storage import default_storage
# from django.core.files.base import ContentFile
# from heapq import merge
# Imports from your apps
from cloudemotion.users.models import (User)
from cloudemotion.common.models import (City)
from common.utils import Base
# from users.models import Peers
from common.utils import ThreadDef
from django.template.loader import render_to_string
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

    def login_user(self):
        if not self._list_basic_info(self.data, ['username', 'password']):
            return

        user = authenticate(
            username=self.data.get('username'),
            password=self.data.get('password')
        )
        if not user:
            self._error_info("user", "is not valid")
            return
        if not user.status:
            self._error_info("user", "dont have permission")
            return

        payload = jwt_payload_handler(user)
        token = jwt_encode_handler(payload)

        self.result = {
            "token": token,
            "id": user.id,
            "level": user.level,
            "level_name": user.get_level_display(),
            "alias": user.name,
            "first_name": user.first_name,
            "last_name": user.last_name,
            "email": user.email,
            "username": user.username,
            "create_at": user.create_at,
            "status": user.status,
            "last_login": user.last_login
        }

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
        user = Users.objects.filter(
            **filters).order_by(*ordening)
        for i in user:
            __dict = {
                "position": i.position,
                "city": i.city,
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
            }
            __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]


    def list_professions(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')
        self.list_professionss(__filters, __paginator, __ordening, __search)

    def list_professionss(self, filters={}, paginator={}, ordening=(), search=None):
        __dict = {}
        general = Professions.objects.filter(**filters)
        __general = User.objects.filter(
            **filters).values(
                "professions__name",
                "professions_id").annotate(Count("professions_id"))
        [__dict.update({i.get('professions_id'): i.get("professions_id__count")}) for i in __general]
        __array = []
        for s in general:
            __dict2 = {
               "id": s.id,
               "name": s.name,
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


    def valid_register_admin(self, kwargs):
        __valid = [
            'confirm_email', "password", "confirm_password",
            'first_name', 'last_name', 'email', 'status', 'username']
        if not self._list_basic_info(kwargs, __valid):
            return
        if not self.list_only_string(self.data, ["first_name", "last_name"]):
            return
        if self.data.get('password') != self.data.get('confirm_password'):
            self._error_info("password", "password must be equals")
            return
        if self.data.get('email') != self.data.get('confirm_email'):
            self._error_info("email", "email must be equals")
            return
        if not self._email(self.data.get('email')):
            return
        return True

    def register_user_admin(self):
        print("Post: " + str(self.request.data))
        if not self.valid_register_admin(self.data):
            return
        try:
            user = User.objects.create_user(
                self.data.get('username'),
                self.data.get('email'),
                self.data.get('password'))
            user.first_name = self.data.get('first_name')
            # user.name = self.data.get('username')
            user.last_name = self.data.get('last_name')
            user.status = self.data.get('status')
            user.level = 1
            user.save()
        except Exception as e:
            self._error_info("error", str(e))
            return
        self.result = self.get_users_admin(user.id)

    def valid_register(self, kwargs):
        __valid = [
            'confirm_email', "password", "confirm_password",
            'alias', 'email']
        if not self._list_basic_info(kwargs, __valid):
            return
        # if not self.list_only_string(self.data, ["first_name"]):
            # return
        if self.data.get('password') != self.data.get('confirm_password'):
            self._error_info("password", "password must be equals")
            return
        if self.data.get('email') != self.data.get('confirm_email'):
            self._error_info("email", "email must be equals")
            return
        # read_date = datetime.strptime(self.data.get("birthday"), '%Y-%m-%d')
        # d = datetime.now()
        # diff = (d - read_date).days
        # years = str(int(diff/365))
        # print(years)
        # if int(years) < 18:
        #     self._error_info("user", "can not be registered is not of age")
        #     return
        if not self._email(self.data.get('email')):
            return
        return True

    def register_user(self):
        # import ipdb; ipdb.set_trace()
        print("Post: " + str(self.request.data))
        if not self.valid_register(self.data):
            return
        try:
            user = User.objects.create_user(
                self.data.get('email'),
                self.data.get('email'),
                self.data.get('password'))
            # user.first_name = self.data.get('first_name')
            user.name = self.data.get('alias')
            if self.data.get("image"):
                user.image = self.data.get("image")
            else:
                user.image = "http://"+self.request.META['HTTP_HOST']+"/static/images/imgpsh_fullsize.png"
            # user.birthday = self.data.get('birthday')
            user.status = False
            user.level = 2
            user.save()
            self.export_attr(Folder, self.data)
            self.values["name"] = "Public"
            self.values["user_id"] = user.id
            Folder.objects.create(**self.values)
        except Exception as e:
            self._error_info("error", str(e))
            return
        __token = self.generator()
        cache.set(
            __token,
            user.id,
            12000000000
        )
        rendered = render_to_string(
            'confirmation_email.html', {
                "url": "http://"+self.request.META['HTTP_HOST']+"/api/v0/confirmation/"+__token})
        __start = ThreadDef(
            self.send_mail, *[self.data.get('email'),
                              "Confirmation Email", rendered])
        __start.start()
        self.result = {"result": {"user": "it send a email"}}
        # x = self.get_users_admin(user.id)

    def get_users_admin(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')
        # __filters.update({"level": "1"})
        self.get_user_admin(__filters, __paginator, __ordening, __search)

    def get_users(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        __search = self.request.GET.get('search')
        self.get_user(__filters, __paginator, __ordening, __search)

    def get_user_admin(self, filters={}, paginator={}, ordening=(), search=None):
        print(filters)
        __array = []
        filters.update({"level": 1})
        if search:
            __x = User.objects.filter(
                **filters).filter(
                Q(create_at__icontains=search) |
                Q(last_login__icontains=search) |
                Q(email__icontains=search) |
                Q(id__icontains=search) |
                Q(status__icontains=search) |
                Q(level__icontains=search) |
                Q(username__icontains=search) |
                Q(last_name__icontains=search) |
                Q(email__icontains=search) |
                Q(name__icontains=search)).order_by(*ordening)
        else:
            __x = User.objects.filter(**filters).order_by(*ordening)

        for i in __x:
            __dict = {
                "url": self.url_api+"/users_admin/"+str(i.id),
                "id": i.id,
                "level": i.level,
                "level_name": i.get_level_display(),
                "alias": i.name,
                "first_name": i.first_name,
                "last_name": i.last_name,
                "email": i.email,
                "username": i.username,
                "status": i.status,
                "create_at": i.create_at,
                "last_login": i.last_login,
                "level_dict": {
                    "id": i.level,
                    "level_name": i.get_level_display(),
                },
            }
            __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array
        return __array

    def get_user(self, filters={}, paginator={}, ordening=(), search=None):
        __array = []
        # __gene = {}
        filters.update({"level": 2})
        __hobbies = [i for i in Hobbies.objects.filter(status=True)]
        __fetishes = [i for i in Fetishes.objects.filter(status=True)]
        __preference = [i for i in Preference.objects.filter(status=True)]
        __sickness = [i for i in Sickness.objects.filter(status=True)]

        if search:
            __x = User.objects.filter(
                **filters).filter(
                Q(create_at__icontains=search) |
                Q(last_login__icontains=search) |
                Q(id__icontains=search) |
                Q(status__icontains=search) |
                Q(username__icontains=search) |
                Q(last_name__icontains=search) |
                Q(email__icontains=search) |
                Q(name__icontains=search)).prefetch_related(
                "habbies_user",
                "user_s",
                "user_p",
                "user_fet")
        else:
            __x = User.objects.filter(**filters).prefetch_related(
                "habbies_user",
                "user_s",
                "user_p",
                "user_fet")
        # import ipdb; ipdb.set_trace()
        for i in __x:
            print(i.habbies_user)
            __dict = {
                "id": i.id,
                "url": self.url_api+"/users/"+str(i.id),
                "alias": i.name,
                "firts_name": i.first_name,
                "last_name": i.last_name,
                "email": i.email,
                "username": i.username,
                "politics": i.politics,
                "weight": i.weight,
                "height": i.height,
                "size_penis": i.size_penis,
                "latitude": i.latitude,
                "longitude": i.longitude,
                "status": i.status,
                "birthday": i.birthday,
                "create_at": i.create_at,
                "last_login": i.last_login,
                "date_analysis": i.date_analysis,
                "image": i.image,
                "description": i.description,
                "hobbies_user": [],
                "sickness": [],
                "preference": [],
                "fetishes": [],
                "city": {
                    "id": i.city_id,
                    "name": i.city.name,
                } if i.city_id else {},
                "state": {
                    "id": i.city.state_id,
                    "name": i.city.state.name,
                } if i.city_id else {},
                "country": {
                    "id": i.city.state.country_id,
                    "name": i.city.state.country.name
                } if i.city_id else {}
            }
            if i.city_id:
                __dict.update({
                    "country": {
                        "id": i.city.state.country.id,
                        "name": i.city.state.country.name,
                        "state": {
                            "id": i.city.state.id,
                            "name": i.city.state.name,
                            "city": {
                                "id": i.city_id,
                                "name": i.city.name,
                            }
                        }
                    }

                })
            __dict.update({
                "rol_sexual_dict": {
                    "id": i.rol_sexual_id,
                    "name": i.rol_sexual.name
                } if i.rol_sexual_id else {},

            })
            __dict.update({
                "professions_dict": {
                    "id": i.professions_id,
                    "name": i.professions.name
                } if i.professions_id else {},

            })

            __dict.update({
                "ethnicities_dict": {
                    "id": i.ethnicities_id,
                    "name": i.ethnicities.name
                } if i.ethnicities_id else {},

            })
            __dict.update({
                "physical_conflections_dict": {
                    "id": i.physical_conflections_id,
                    "name": i.physical_conflections.name
                } if i.physical_conflections_id else {},

            })

            __h = [e.hobbies_id for e in i.habbies_user.all()]
            for ho in __hobbies:
                __dict1 = {
                    "id": ho.id,
                    "dict": {
                        "id": ho.id,
                        "name": ho.name,
                    }
                }

                if ho.id in __h:
                    __dict1["dict"].update({"status": True})
                else:
                    __dict1["dict"].update({"status": False})
                __dict['hobbies_user'].append(__dict1)
            __s = [e.sickness_id for e in i.user_s.all()]
            for s in __sickness:
                    __dict2 = {
                        "id": s.id,
                        "dict": {
                            "id": s.id,
                            "name": s.name,
                        }
                    }
                    if s.id in __s:
                        __dict2["dict"].update({"status": True})
                    else:
                        __dict2["dict"].update({"status": False})
                    __dict['sickness'].append(__dict2)
            __p = [e.preference_id for e in i.user_p.all()]
            for p in __preference:
                    __dict3 = {
                        "id": p.id,
                        "dict": {
                            "id": p.id,
                            "name": p.name,

                        }
                    }
                    if p.id in __p:
                        __dict3["dict"].update({"status": True})
                    else:
                        __dict3["dict"].update({"status": False})
                    __dict['preference'].append(__dict3)
            __f = [e.fetishes_id for e in i.user_fet.all()]
            for f in __fetishes:
                    __dict4 = {
                        "id": f.id,
                        "dict": {
                            "id": f.id,
                            "name": f.name,
                        }
                    }
                    if f.id in __f:
                        __dict4["dict"].update({"status": True})
                    else:
                        __dict4["dict"].update({"status": False})
                    __dict['fetishes'].append(__dict4)
            __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
        # return __array

    def update_user_admin(self, user_id):
        self.data = self.request.data
        User = get_user_model()
        __valid = ['confirm_email', 'username',
                   'first_name', 'last_name', 'email', 'status']
        if not self._list_basic_info(self.data, __valid):
            return
        if not self.list_only_string(self.data, ["last_name", "first_name"]):
            return
        if self.data.get('email') != self.data.get('confirm_email'):
            self._error_info("email", "email must be equals")
            return
        update = User.objects.filter(id=user_id)
        user = update[0]
        user.last_name = self.data.get('last_name')
        user.first_name = self.data.get('first_name')
        user.email = self.data.get('email')
        user.username = self.data.get('username')
        user.address = self.data.get('address')
        user.status = self.data.get('status')
        if self.data.get("password"):
            if self.data.get('password') != self.data.get('confirm_password'):
                self._error_info("password", "password must be equals")
                return
            user.set_password(self.data.get("password"))
        user.save()
        x = self.get_users_admin(user.id)
        self.result = x

    def delete_user_admin(self, user_id):
        self.data = self.request.data
        User = get_user_model()
        if not User.objects.filter(id=user_id, status=True):
            self._error_info("Usuario", "does not exit")
            return
        delete = User.objects.get(id=user_id)
        delete.status = False
        delete.save()
        x = self.get_users_admin(user_id)
        self.result = x

    def status_user(self, user_id):
        self.data = self.request.data
        __valid = [
                   'status',
                   ]
        if not self._list_basic_info(self.data, __valid):
            return
        User = get_user_model()
        if not User.objects.filter(id=user_id):
            self._error_info("Usuario", "does not exit")
            return
        delete = User.objects.get(id=user_id)
        delete.status = self.data.get("status")
        delete.save()
        x = self.get_users(user_id)
        self.result = x

    def valid_update_user_session(self, kwargs):
        __valid = [
           'last_name',
           'first_name',
           # 'email',
           # "password",
           'city_id',
           'weight',
           'height',
           'size_penis',
           # 'latitude',
           # 'longitude',
           'alias',
           'birthday',
           # 'confirm_password',
           'fetishes',
           'sickness',
           'preference',
           'hobbies',
           'rol_sexual_id',
           'professions_id',
           'ethnicities_id',
           'physical_conflections_id']
        if not self._list_basic_info(kwargs, __valid):
            return
        if not self.list_only_string(kwargs, ["last_name", "first_name"]):
            return
        if not self._list_int_info(kwargs, ["rol_sexual_id",
                                               "city_id",
                                               "professions_id",
                                               "ethnicities_id",
                                               "physical_conflections_id"]):
            return
        if not Roles.objects.filter(id=kwargs.get('rol_sexual_id')):
            self._error_info("rol", "does not exit")
            return
        if not Professions.objects.filter(id=kwargs.get('professions_id')):
            self._error_info("professions", "does not exit")
            return
        if not Ethnicities.objects.filter(id=kwargs.get('ethnicities_id')):
            self._error_info("Ethnicities", "does not exit")
            return
        if not PhysicalConflections.objects.filter(
                id=kwargs.get('physical_conflections_id')):
            self._error_info("PhysicalConflections", "does not exit")
            return
        if not City.objects.filter(id=kwargs.get('city_id')):
            self._error_info("City", "does not exit")
            return
        try:
            # import ipdb; ipdb.set_trace()
            self.fetishes = loads(kwargs['fetishes'])
        except:
            self._error_info("fetishes", "format incorrect")
            return
        try:
            self.sickness = loads(kwargs['sickness'])
        except:
            self._error_info("sickness", "format incorrect")
            return
        try:
            self.preference = loads(kwargs['preference'])
        except:
            self._error_info("preference", "format incorrect")
            return
        try:
            self.hobbies = loads(kwargs['hobbies'])
        except:
            self._error_info("hobbies", "format incorrect")
            return
        for i in self.fetishes:
            if not Fetishes.objects.filter(id=i["dict"]["id"],
                                           status=True):
                self._error_info("fetishes_id", "it is not exists")
                return
        for i in self.sickness:
            print(i["dict"]["id"])
            if not Sickness.objects.filter(id=i["dict"]["id"],
                                           status=True):
                self._error_info("sickness_id", "it is not exists")
                return
        for i in self.preference:
            if not Preference.objects.filter(id=i["dict"]["id"],
                                             status=True):
                self._error_info("preference_id", "it is not exists")
                return
        for i in self.hobbies:
            if not Hobbies.objects.filter(id=i["dict"]["id"],
                                          status=True):
                self._error_info("hobbies_id", "it is not exists")
                return
        return True

    def update_user_session(self):
        self.data = self.request.data
        if not self.valid_update_user_session(self.data):
            return
        User = get_user_model()
        update = User.objects.filter(id=self.request.user.id)
        if not update:
            self._error_info("Usuario", "no existe")
            return
        self.request.user.last_name = self.data.get('last_name')
        self.request.user.first_name = self.data.get('first_name')
        self.request.user.birthday = self.data.get('birthday')
        self.request.user.weight = self.data.get('weight')
        self.request.user.height = self.data.get('height')
        self.request.user.name = self.data.get('alias')
        self.request.user.city_id = self.data.get('city_id')
        self.request.user.description = self.data.get('description')
        # self.request.user.email = self.data.get('email')
        # self.request.user.latitude = self.data.get('latitude')
        # self.request.user.longitude = self.data.get('longitude')
        self.request.user.size_penis = self.data.get('size_penis')
        self.request.user.rol_sexual_id = self.data.get('rol_sexual_id')
        self.request.user.professions_id = self.data.get('professions_id')
        self.request.user.ethnicities_id = self.data.get('ethnicities_id')
        self.request.user.physical_conflections_id = self.data.get('physical_conflections_id')
        if self.data.get("image"):
            self.request.user.image = self.data.get("image")
        else:
            self.request.user.image = "http://"+self.request.META['HTTP_HOST']+"/static/images/imgpsh_fullsize.png"
        # self.request.user.set_password(self.data.get("password"))
        self.request.user.save()
        print(self.fetishes)
        FetishesUser.objects.filter(user_id=self.request.user.id).delete()
        for i in self.fetishes:
            # import ipdb; ipdb.set_trace()
            if i["dict"].get("status"):
                FetishesUser.objects.get_or_create(
                    user_id=self.request.user.id,
                    fetishes_id=i['dict']["id"])

        SicknessUser.objects.filter(user_id=self.request.user.id).delete()
        for i in self.sickness:
            if i["dict"].get("status"):
                SicknessUser.objects.get_or_create(
                    user_id=self.request.user.id,
                    sickness_id=i['dict']["id"])

        PreferenceUser.objects.filter(user_id=self.request.user.id).delete()
        for i in self.preference:
            if i["dict"].get("status"):
                PreferenceUser.objects.get_or_create(
                    user_id=self.request.user.id,
                    preference_id=i['dict']["id"])

        HobbiesUser.objects.filter(user_id=self.request.user.id).delete()
        for i in self.hobbies:
            if i["dict"].get("status"):
                HobbiesUser.objects.get_or_create(
                    user_id=self.request.user.id,
                    hobbies_id=i['dict']["id"])

        self.get_users(self.request.user.id)

    def valid_update_user(self, kwargs):
        __valid = [
           'last_name',
           'first_name',
           'city_id',
           'weight',
           'height',
           'size_penis',
           'latitude',
           'alias',
           'longitude',
           'birthday',
           'confirm_password',
           'rol_sexual_id',
           'professions_id',
           'ethnicities_id',
           'physical_conflections_id']
        if not self._list_basic_info(kwargs, __valid):
            return
        if not self.list_only_string(kwargs, ["last_name", "first_name"]):
            return
        if not self._list_int_info(kwargs, ["rol_sexual_id",
                                               "city_id",
                                               "professions_id",
                                               "ethnicities_id",
                                               "physical_conflections_id"]):
            return
        if not Roles.objects.filter(id=kwargs.get('rol_sexual_id')):
            self._error_info("rol_sexual_id", "does not exit")
            return
        if not Professions.objects.filter(id=kwargs.get('professions_id')):
            self._error_info("professions_id", "does not exit")
            return
        if not Ethnicities.objects.filter(id=kwargs.get('ethnicities_id')):
            self._error_info("ethnicities_id", "does not exit")
            return
        if not PhysicalConflections.objects.filter(
                id=kwargs.get('physical_conflections_id')):
            self._error_info("PhysicalConflections", "does not exit")
            return
        if not City.objects.filter(id=kwargs.get('city_id')):
            self._error_info("city_id", "does not exit")
            return
        return True

    def update_user(self):
        # self.data = self.request.data
        if not self.valid_update_user(self.data):
            return
        User = get_user_model()
        update = User.objects.filter(id=self.request.user.id)
        if not update:
            self._error_info("Usuario", "no existe")
            return
        self.request.user.last_name = self.data.get('last_name')
        self.request.user.first_name = self.data.get('first_name')
        self.request.user.birthday = self.data.get('birthday')
        self.request.user.weight = self.data.get('weight')
        self.request.user.height = self.data.get('height')
        self.request.user.username = self.data.get('username')
        # self.request.user.email = self.data.get('email')
        self.request.user.size_penis = self.data.get('size_penis')
        self.request.user.rol_sexual_id = self.data.get('rol_sexual_id')
        self.request.user.professions_id = self.data.get('professions_id')
        self.request.user.ethnicities_id = self.data.get('ethnicities_id')
        self.request.user.physical_conflections_id = self.data.get('physical_conflections_id')
        if self.data.get("image"):
            self.request.user.image = self.data.get("image")
        else:
            self.request.user.image = "http://"+self.request.META['HTTP_HOST']+"/static/images/imgpsh_fullsize.png"
        # self.request.user.set_password(self.data.get("password"))
        self.request.user.save()
        x = self.get_users(self.request.user.id)
        self.result = x

    def fetishes_user(self):
        __valid = [
                   'fetishes',
                   ]
        if not self._list_basic_info(self.data, __valid):
            return
        try:
            self.data['fetishes'] = loads(self.data['fetishes'])
        except:
            self._error_info("fetishes", "format incorrect")
            return
        for i in self.data['fetishes']:
            # if not self._list_int_info(i['fetishes_id'], __valid):
            #     return
            if not Fetishes.objects.filter(id=i['fetishes_id'],
                                           status=True):
                self._error_info("fetishes_id", "it is not exists")
                return
            fetishes = FetishesUser.objects.filter(
                fetishes_id=i["fetishes_id"],
                user_id=self.request.user.id)
            if fetishes:
                if i["status"] == True:
                    fetishes[0].status = i["status"]
                    fetishes[0].save()
            else:
                if i["status"] == True:
                    self.export_attr(FetishesUser, self.data)
                    self.values["user_id"] = self.request.user.id
                    self.values["fetishes_id"] = i["fetishes_id"]
                    self.values["status"] = i["status"]
                    FetishesUser.objects.create(**self.values)
        self.get_users(self.request.user.id)


    def fetishes_user_delete(self, pk):
        if not Fetishes.objects.filter(id=pk,
                                       status=True):
            self._error_info("fetishes_id", "it is not exists")
            return
        if not FetishesUser.objects.filter(
                user_id=self.request.user.id,
                fetishes_id=pk):
            self._error_info("fetishes", "it is not exists for users")
            return
        FetishesUser.objects.get(fetishes_id=pk,
                                 user_id=self.request.user.id).delete()
        self.result = "Delete Exit"

    def sickness_user(self):
        __valid = [
                   'sickness',
                   ]
        if not self._list_basic_info(self.data, __valid):
            return
        try:
            self.data['sickness'] = loads(self.data['sickness'])
        except:
            self._error_info("sickness", "format incorrect")
            return
        for i in self.data['sickness']:
            # if not self._list_int_info(i, __valid):
            #     return
            if not Sickness.objects.filter(id=i['sickness_id'],
                                           status=True):
                self._error_info("sickness_id", "it is not exists")
                return
            sickness = SicknessUser.objects.filter(
                sickness_id=i["sickness_id"],
                user_id=self.request.user.id)
            if sickness:
                if i["status"] == True:
                    sickness[0].status = i["status"]
                    sickness[0].save()
            else:
                if i["status"] == True:
                    self.export_attr(SicknessUser, self.data)
                    self.values["user_id"] = self.request.user.id
                    self.values["sickness_id"] = i["sickness_id"]
                    self.values["status"] = i["status"]
                    SicknessUser.objects.create(**self.values)
        x = self.get_users(self.request.user.id)
        self.result = x

    def sickness_user_delete(self, pk):
        if not Sickness.objects.filter(id=pk,
                                       status=True):
            self._error_info("sickness_id", "it is not exists")
            return
        if not SicknessUser.objects.filter(
                user_id=self.request.user.id,
                sickness_id=pk):
            self._error_info("sickness", "it is not exists for users")
            return
        SicknessUser.objects.get(sickness_id=pk,
                                 user_id=self.request.user.id).delete()
        self.result = "Delete Exit"

    def preference_user(self):
        __valid = [
                   'preference',
                   ]
        if not self._list_basic_info(self.data, __valid):
            return
        try:
            self.data['preference'] = loads(self.data['preference'])
        except:
            self._error_info("preference", "format incorrect")
            return
        for i in self.data['preference']:
            # if not self._list_int_info(i, __valid):
            #     return
            if not Preference.objects.filter(id=i['preference_id'],
                                             status=True):
                self._error_info("preference_id", "it is not exists")
                return
            preference = PreferenceUser.objects.filter(
                preference_id=i["preference_id"],
                user_id=self.request.user.id)
            if preference:
                if i["status"] == True:
                    preference[0].status = i["status"]
                    preference[0].save()
            else:
                if i["status"] == True:
                    self.export_attr(PreferenceUser, self.data)
                    self.values["user_id"] = self.request.user.id
                    self.values["preference_id"] = i["preference_id"]
                    self.values["status"] = i["status"]
                    PreferenceUser.objects.create(**self.values)
        x = self.get_users(self.request.user.id)
        self.result = x

    def preference_user_delete(self, pk):
        if not Preference.objects.filter(id=pk,
                                         status=True):
            self._error_info("preference_id", "it is not exists")
            return
        if not PreferenceUser.objects.filter(
                user_id=self.request.user.id,
                preference_id=pk):
            self._error_info("preference", "it is not exists for users")
            return
        PreferenceUser.objects.get(preference_id=pk,
                                   user_id=self.request.user.id).delete()
        self.result = ("Delete Exit")

    def hobbies_user(self):
        __valid = [
                   'hobbies',
                   ]
        if not self._list_basic_info(self.data, __valid):
            return
        try:
            self.data['hobbies'] = loads(self.data['hobbies'])
        except:
            self._error_info("hobbies", "format incorrect")
            return
        for i in self.data['hobbies']:
            # print(i['hobbies_id'])
            if not Hobbies.objects.filter(id=i['hobbies_id'],
                                          status=True):
                self._error_info("hobbies_id", "it is not exists")
                return
            hobbies = HobbiesUser.objects.filter(hobbies_id=i["hobbies_id"],
                                                 user_id=self.request.user.id)
            if hobbies:
                if i["status"] == True:
                    hobbies[0].status = i["status"]
                    hobbies[0].save()
            else:
                if i["status"] == True:
                    self.export_attr(HobbiesUser, self.data)
                    self.values["user_id"] = self.request.user.id
                    self.values["hobbies_id"] = i["hobbies_id"]
                    self.values["status"] = i["status"]
                    HobbiesUser.objects.create(**self.values)
        x = self.get_users(self.request.user.id)
        self.result = x

    def hobbies_user_delete(self, pk):
        if not Hobbies.objects.filter(id=pk,
                                      status=True):
            self._error_info("hobbies_id", "it is not exists")
            return
        if not HobbiesUser.objects.filter(
                user_id=self.request.user.id,
                hobbies_id=pk):
            self._error_info("hobbies", "it is not exists for users")
            return
        HobbiesUser.objects.get(hobbies_id=pk,
                                user_id=self.request.user.id).delete()
        self.result = "Delete Exit"

    def valid_recover_password(self, kwargs):
        User = get_user_model()
        if not self._list_basic_info(kwargs, ['email']):
            return
        if not self._email(kwargs.get('email')):
            return

        self.__user = User.objects.filter(email=self.data.get('email'))
        if not self.__user:
            self._error_info('email', 'it is not exists')
            return
        return True

    def recover_password(self):
        self.data = self.request.data
        if not self.valid_recover_password(self.data):
            return

        __token = self.generator()
        cache.set(
            __token,
            self.__user[0].id,
            12000000000
        )

        rendered = render_to_string(
            'recovery_password.html', {
                "name": self.__user[0].name + " " + self.__user[0].last_name,
                "url": "http://"+self.request.META['HTTP_HOST']+"/api/v0/recovery/"+__token})
        __start = ThreadDef(
            self.send_mail, *[self.data.get('email'),
                              "Recovery Password", rendered])
        __start.start()
        self.result = {"result": 'Se ha enviado un correo para restaurar su clave'}

    def valid_change_password(self, kwargs):
        __valid = ['token', 'password', 'confirm_password']
        if not self._list_basic_info(kwargs, __valid):
            return
        # import ipdb; ipdb.set_trace()
        self.__id = cache.get(self.data.get('token'))
        if not self.__id:
            self._error_info('token', 'invalid token')
            return

        if self.data.get('password') != self.data.get('confirm_password'):
            self._error_info("password", "password must be equals")
            return

        return True

    def change_password(self, token):
        User = get_user_model()
        self.data['token'] = token
        if not self.valid_change_password(self.data):
            return

        __user = User.objects.get(id=self.__id)
        __user.set_password(self.data.get('password'))
        __user.save()

        self.result = "password change"

    def valid_change_confirmation(self, kwargs):
        __valid = ['token']
        if not self._list_basic_info(kwargs, __valid):
            return
        self.__id = cache.get(self.data.get('token'))
        if not self.__id:
            self._error_info('token', 'invalid token')
            return
        return True

    def change_confirmation(self, token):
        User = get_user_model()
        self.data['token'] = token
        if not self.valid_change_confirmation(self.data):
            return
        __user = User.objects.get(id=self.__id)
        __user.status = True
        __user.save()

    def get_users_app(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        # __search = self.request.GET.get('search')
        self.get_user_apps(__filters, __paginator, __ordening)

    def get_user_apps(self, filters={}, paginator={}, ordening=()):
        __array = []
        __valid = ['latitude', 'longitude']
        self.request.user.latitude = filters.get('latitude')
        self.request.user.longitude = filters.get('longitude')
        self.request.user.save()
        if not self._list_basic_info(filters, __valid):
            return
        filters.update({"level": 2})
        point1 = float(filters.get("latitude")), float(filters.get("longitude"))
        if not filters.get("km"):
            km = 10
        if filters.get("km"):
            km = float(self.data.get("km"))
            del filters["km"]
        if filters.get("latitude"):
            del filters["latitude"]
        if filters.get("longitude"):
            del filters["longitude"]
        __user = User.objects.all()
        __user_f = [i.user_f.id for i in self.request.user.user_favo.all()]
        # import ipdb; ipdb.set_trace()
        for i in __user:
            diff = (datetime.now().date() - (i.birthday if i.birthday else datetime.now().date())).days
            years = str(int(diff/365))
            __dict = {
                "id": i.id,
                "username": i.username,
                "alias": i.name,
                "first_name": i.first_name,
                "last_login": i.last_login,
                "latitude": i.latitude,
                "longitude": i.longitude,
                "age": years,
                "image": i.image,
                "favorite": True if (i.id in __user_f) else False,
            }
            point2 = (float(i.latitude if i.latitude else 0), float(i.longitude if i.longitude else 0))
            h = self.distance_two_point(point1, point2)
            km2 = h/1000
            km1 = round(km2, 1)
            if km1 < km:
                __dict.update({"distance": {"distance": km1, "unit": "km"}})
                __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]
# http://192.168.1.101:8020/api/v0/home_app/?filters={%22latitude%22:%227.468687636686609%22,%22longitude%22:%22-66.74263000488281%22}
# http://192.168.1.101:8020/api/v0/home_app/?filters={%22latitude%22:%224.570868%22,%22longitude%22:%22-74.29733299999998%22}

    def get_users_app_f(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        # __search = self.request.GET.get('search')
        self.get_user_apps_f(__filters, __paginator, __ordening)

    def get_user_apps_f(self, filters={}, paginator={}, ordening=()):
        print(self.request.user.user_favo.all().values("user_f_id"))
        filters.update({"latitude": self.request.user.latitude})
        filters.update({"longitude": self.request.user.longitude})
        __array = []
        __dict1 = {}
        filters.update({"level": 2})
        point1 = float(filters.get("latitude")), float(filters.get("longitude"))
        if not filters.get("km"):
            km = 10
        if filters.get("km"):
            km = float(self.data.get("km"))
            del filters["km"]
        if filters.get("latitude"):
            del filters["latitude"]
        if filters.get("longitude"):
            del filters["longitude"]
        user = User.objects.filter(
          **filters).prefetch_related("user_favo")
        # general = FavouriteUser.objects.filter(
        #     user_id=self.request.user.id).values("user_id")
        # [__dict1.update({i.get('user_id'): i.get("user_id")}) for i in general]
        print(__dict1)
        for i in user:
            diff = (datetime.now().date() - i.birthday).days
            years = str(int(diff/365))
            __dict = {
                "id": i.id,
                "username": i.username,
                "last_login": i.last_login,
                "latitude": i.latitude,
                "longitude": i.longitude,
                "age": years,
                # "f": __dict1.get((i.id), True),
                "favourite": [],
            }
            # if i.user_favo.all():
            #     print("f")
            # for e in i.user_favo.all():
            # print(e)
            # __dict.update({"favor": e.status})
            point2 = (float(i.latitude), float(i.longitude))
            h = self.distance_two_point(point1, point2)
            km2 = h/1000
            km1 = round(km2, 1)
            if km1 < km:
                __dict.update({"distance": {"distance": km1, "unit": "km"}})
                __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]

    def get_users_file(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        self.get_user_file(__filters, __paginator, __ordening)

    def get_user_file(self, filters={}, paginator={}, ordening=()):
        __array = []
        filters.update({"folder__user_id": self.request.user.id})
        folder = FolderImageUser.objects.filter(
          **filters)
        for i in folder:
            __dict = {
                "id": i.id,
                "image": i.image,
                "folder_id": i.folder_id
            }
            __array.append(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]

    def get_users_folder(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})

        self.get_user_folders(__filters, __paginator, __ordening)

    def get_user_folders(self, filters={}, paginator={}, ordening=()):
        __array = []
        filters.update({"user_id": self.request.user.id})
        # filters.update({"name": "Public"})
        # import ipdb; ipdb.set_trace()
        folder = Folder.objects.filter(
          **filters).prefetch_related("file_user")
        for i in folder:
            __dict = {
                "id": i.id,
                "name": i.name,
                "images": [],
            }
            for e in i.file_user.all():
                    __dict2 = {
                        "id": e.id,
                        "image": e.image,
                    }
                    __dict['images'].append(__dict2)
            __array.append(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]

    def valid_register_folder(self, kwargs):
        __valid = [
            "name",
            ]
        if not self._list_basic_info(kwargs, __valid):
            return
        if Folder.objects.filter(name=kwargs.get("name")):
            self._error_info("Folder", "already exist with this name")
            return
        return True

    def create_folder(self):
        if not self.valid_register_folder(self.data):
            return
        self.export_attr(Folder, self.data)
        self.values["user_id"] = self.request.user.id
        create = Folder.objects.create(**self.values)
        self.get_users_folder(create.id)

    def delete_folder(self, pk):
        self.data = self.request.data
        folders = Folder.objects.filter(id=pk, user_id=self.request.user.id)
        if not folders:
            self._error_info("Folder",
                             "is not exist")
            return
        if folders[0].name == "Public":
            self._error_info(
                "Folder",
                "can not delete folder becuase is a folder Public")
            return
        folder = FolderImageUser.objects.filter(folder_id=pk)
        print(folders[0].name)
        if folder:
            self._error_info(
                "Folder",
                "can not delete folder should move images to another folder")
            return
        Folder.objects.get(id=pk,
                           user_id=self.request.user.id).delete()
        self.get_users_folder(pk)

    def update_folder(self, pk):
        # self.data = self.request.data
        if not Folder.objects.filter(id=pk, user_id=self.request.user.id):
            self._error_info("Folder",
                             "is not exist")
            return
        self.export_attr(Folder, self.data)
        Folder.objects.filter(
            id=pk,
            user_id=self.request.user.id
        ).update(**self.values)
        self.get_users_folder(pk)

    def valid_register_img(self, kwargs):
        __valid = [
            "image", "folder_id"
            ]
        if not self._list_basic_info(kwargs, __valid):
            return
        if self.data["image"]:
            try:
                self.data['image'] = loads(self.data['image'])
            except:
                self._error_info("image", "format incorrect")
                return
        return True

    def create_img(self):
        print("Post: " + str(self.request.data))
        print(self.request.user.id)
        if not self.valid_register_img(self.data):
            return
        # import ipdb; ipdb.set_trace()
        if self.data.get("folder_id"):
            if not Folder.objects.filter(id=self.data.get("folder_id"),
                                         user_id=self.request.user.id):
                self._error_info("Folder", "does not exist")
                return
            for i in self.data['image']:
                # __name = self.remove_space_string(i)
                # __files = default_storage.save(
                    # 'tmp_media/' + __name,
                    # ContentFile(__files.read()))
                # self.export_attr(FolderImageUser, i)
                __dict = {}
                __dict["folder_id"] = self.data.get("folder_id")
                __dict['image'] = i
                FolderImageUser.objects.create(**__dict)
            self.result = {"result": "image uploaded"}
        else:
            if self.data.get("name"):
                self.export_attr(Folder, self.data)
                self.values["user_id"] = self.request.user.id
                create = Folder.objects.create(**self.values)
                if self.data["image"]:
                    for i in self.data['image']:
                        self.export_attr(FolderImageUser, i)
                        self.values["folder_id"] = create.id
                        FolderImageUser.objects.create(**self.values)
                self.result = ("Image upload")
            else:
                search = Folder.objects.filter(name="directory",
                                               user_id=self.request.user.id)
                if search:
                    if self.data["image"]:
                        for i in self.data['image']:
                            self.export_attr(FolderImageUser, i)
                            self.values["user_id"] = self.request.user.id
                            self.values["folder_id"] = search[0].id
                            FolderImageUser.objects.create(**self.values)
                    self.result = ("Image upload")
                else:
                    self.export_attr(Folder, self.data)
                    self.values["name"] = "directory"
                    self.values["user_id"] = self.request.user.id
                    create = Folder.objects.create(**self.values)
                    if self.data["image"]:
                        for i in self.data['image']:
                            self.export_attr(FolderImageUser, i)
                            self.values["user_id"] = self.request.user.id
                            self.values["folder_id"] = create.id
                            FolderImageUser.objects.create(**self.values)
                    self.result = ("Image upload")

    def delete_file(self):
        # self.data = self.request.data
        self.data['id__in'] = loads(self.data.get('id__in'))
        # print(self.data)
        if not self._list_basic_info(self.data, ['id__in']):
            return
        __folder_img = FolderImageUser.objects.filter(
            id__in=self.data.get('id__in'),
            folder__user_id=self.request.user.id)
        if not __folder_img:
            self._error_info("FolderImageUser",
                             "is not exist")
            return
        __folder_img.delete()

        self.result = {"result": "exitoso"}
        # x = self.get_users_file(pk)
        # self.result = x

    def move_file(self, pk):
        self.data['id__in'] = loads(self.data.get('id__in'))
        if not self._list_basic_info(self.data, ['id__in']):
            return

        __file = FolderImageUser.objects.filter(
            id__in=self.data['id__in'],
            folder__user_id=self.request.user.id)
        if not __file:
            self._error_info("file", "it is not exists")
            return

        __file.update(folder_id=pk)
        self.result = {"result": "finish"}

    def update_file(self, pk):
        self.data = self.request.data
        __valid = [
                   'folder_id',
                   ]
        if not self._list_basic_info(self.data, __valid):
            return
        if not Folder.objects.filter(id=self.data.get("folder_id"),
                                     user_id=self.request.user.id):
            self._error_info("Folder", "does not exit")
            return
        if not FolderImageUser.objects.filter(id=pk,
                                              folder__user_id=self.request.user.id):
            self._error_info("Image", "does not exit")
            return
        update = FolderImageUser.objects.get(id=pk)
        update.folder_id = self.data.get("folder_id")
        update.save()
        self.result = ("Image upload")

    def get_users_places(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        # __search = self.request.GET.get('search')
        self.get_users_placess(__filters, __paginator, __ordening)

    def get_users_placess(self, filters={}, paginator={}, ordening=()):
        __array = []
        __valid = ['latitude', 'longitude']
        if not self._list_basic_info(filters, __valid):
            return
        point1 = float(filters.get("latitude")), float(filters.get("longitude"))
        if not filters.get("km"):
            km = 10
        if filters.get("km"):
            km = float(self.data.get("km"))
            del filters["km"]
        if filters.get("latitude"):
            del filters["latitude"]
        if filters.get("longitude"):
            del filters["longitude"]
        places = Places.objects.filter().prefetch_related("places_image")
        for i in places:
            __dict = {
                "id": i.id,
                "name": i.name,
                "description": i.description,
                "latitude": i.latitude,
                "longitude": i.longitude,
                "category": {
                    "id": i.category_id,
                    "name": i.category.name,
                    "description": i.description,
                },
                "images": [],
                "image": i.image,
            }
            for e in i.places_image.all():
                __dict1 = {
                    "id": e.id,
                    "image": e.image,
                    "status": e.status
                }
                __dict['images'].append(__dict1)
            point2 = (float(i.latitude), float(i.longitude))
            h = self.distance_two_point(point1, point2)
            km2 = h/1000
            km1 = round(km2, 1)
            if km1 < km:
                __dict.update({"distance": {"distance": km1, "unit": "km"}})
                __array.append(__dict)

        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]

    def login_user1(self):
        # print ("helo")
        # import ipdb; ipdb.set_trace()
        if not self._list_basic_info(self.data, ['username', 'password']):
            return

        user = authenticate(
            username=self.data.get('username'),
            password=self.data.get('password')
        )
        # login(self.request, user)
        if not user:
            self._error_info("user", "is not valid")
            return
        user.token = self.data.get("token")
        user.save()

        payload = jwt_payload_handler(user)
        token = jwt_encode_handler(payload)
        # import ipdb; ipdb.set_trace()

        self.result = {
            "token": token,
            "id": user.id,
            "image": user.image,
            "level": user.level,
            "level_name": user.get_level_display(),
            "url_profile": "http://"+self.request.META['HTTP_HOST']+"/api/v0/profile/"+str(user.id),
            "alias": user.name,
            "first_name": user.first_name,
            "last_name": user.last_name,
            "email": user.email,
            "username": user.username,
            "create_at": user.create_at,
            "status": user.status,
            "last_login": user.last_login
        }

        # if user.city:
        #     self.result.update({"country": {
        #             "id": user.city.state.country_id,
        #             "name": user.city.state.country.name,
        #             "state": {
        #                 "id": user.city.state_id,
        #                 "name": user.city.state.name,
        #                 "city": {
        #                     "id": user.city_id,
        #                     "name": user.city.name,
        #                 }
        #             }
        #         }
        #     })

    def get_users_folder_users(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})
        self.get_user_folders_user(__filters, __paginator, __ordening)

    def get_user_folders_user(self, filters={}, paginator={}, ordening=()):
        __array = []
        filters.update({"name": "Public"})
        folder = Folder.objects.filter(
          **filters).prefetch_related("file_user")
        for i in folder:
            __dict = {
                "id": i.id,
                "name": i.name,
                "user": {
                    "id": i.user_id,
                    "name": i.user.name,
                },
                "images": [],
            }
            for e in i.file_user.all():
                    __dict2 = {
                        "id": e.id,
                        "image": e.image,
                    }
                    __dict['images'].append(__dict2)
            __array.append(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]

    def move_img_public(self):
        __valid = [
                   'image_id',
                   ]
        if not self._list_basic_info(self.data, __valid):
            return
        image = FolderImageUser.objects.filter(id=self.data.get("image_id"),
                                               folder__user_id=self.request.user.id)
        if not image:
                self._error_info("Image", "does not exist")
                return
        folder = Folder.objects.filter(user_id=self.request.user.id,
                                       name="Public")
        if folder:
                    image[0].folder_id = folder[0].id
                    image[0].save()
                    self.result = ("Moved image")
        else:
                    self.export_attr(Folder, self.data)
                    self.values["name"] = "Public"
                    self.values["user_id"] = self.request.user.id
                    create = Folder.objects.create(**self.values)
                    image[0].folder_id = create.id
                    image[0].save()
                    self.result = ("Moved image")

    def dashboards(self):
        __dict = {
            "places_best": [],
            "user_request": [],
        }
        message = Message.objects.filter(
          status=True).values("status").annotate(Count(
            "status")).exclude(status__count=0)
        for i in message:
            __dict.update({"total_message": i.get("status__count", 0)})

        user = User.objects.filter(
          status=True, level=2).values(
          "level").annotate(Count("level")).exclude(level__count=0)
        for e in user:
            __dict.update({"total_user": e.get("level__count", 0)})

        places = PlacesFavouriteUser.objects.filter().values(
            "places_id", "places__name").annotate(Count(
                "places_id")).exclude(places_id__count=0)
        # import ipdb; ipdb.set_trace()
        for e in places:
            __dicte = {
                "id": e.get("places_id"),
                "name": e.get("places__name"),
                "total": e.get("places_id__count"), }
            __dict['places_best'].append(__dicte)

        user_favorite = FavouriteUser.objects.filter().values(
            "user_f_id", "user_f__name").annotate(Count(
                "user_f_id")).exclude(user_f_id__count=0)
        for e in user_favorite:
            __dict3 = {
                "id": e.get("user_f_id"),
                "name": e.get("user_f__name"),
                "total": e.get("user_f_id__count"), }
            __dict['user_request'].append(__dict3)
        self.result = __dict

    def get_users_favorite(self, pk=None):
        __filters = loads(self.request.GET.get('filters', "{}"))
        __paginator = loads(self.request.GET.get('paginator', "{}"))
        __ordening = loads(self.request.GET.get('ordening', "[]"))
        if pk:
            __filters.update({"pk": pk})

        self.get_users_favorites(__filters, __paginator, __ordening)

    def get_users_favorites(self, filters={}, paginator={}, ordening=()):
        __array = []
        if self.request.user.level == 2:
            filters.update({"user_id": self.request.user.id})
        favorite = FavouriteUser.objects.filter(
          **filters)
        for i in favorite:
            __dict = {
                "id": i.id,
                "status": i.status,
                "create_at": i.create_at,
                "user_favorite": {
                    "id": i.user_f_id,
                    "name": i.user_f.name,
                    "username": i.user_f.username,
                    "image": i.user_f.image,
                }
            }
            __array.append(__dict)
        if not filters.get('pk'):
            self.paginator(__array, paginator)
        else:
            if not __array:
                self.result = {"result": "empty"}
                return
            self.result = __array[0]

    def valid_register_favorite(self, kwargs):
        __valid = [
            "user_f_id",
            ]
        if not self._list_basic_info(kwargs, __valid):
            return
        if not User.objects.filter(id=kwargs.get("user_f_id")):
            self._error_info("User", "do not exist user_f_id")
            return
        if FavouriteUser.objects.filter(user_f_id=kwargs.get("user_f_id"),
                                        user_id=self.request.user.id):
            self._error_info("FavouriteUser",
                             "already exist")
            return
        return True

    def create_favorite_user(self):
        if not self.valid_register_favorite(self.data):
            return
        self.export_attr(FavouriteUser, self.data)
        self.values["user_id"] = self.request.user.id
        self.values["user_f_id"] = self.data.get("user_f_id")
        create = FavouriteUser.objects.create(**self.values)
        self.get_users_favorite(create.id)

    def delete_favorite_user(self, pk):
        self.data = self.request.data
        if not FavouriteUser.objects.filter(user_f_id=pk,
                                            user_id=self.request.user.id):
            self._error_info("FavouriteUser",
                             "is not exist")
            return
        FavouriteUser.objects.filter(user_id=self.request.user.id,
                                  user_f_id=pk).delete()
        self.get_users_favorite(pk)

    def valid_change_password2(self, kwargs):
        __valid = ["current", "password", "confirm_password"]
        if not self._list_basic_info(kwargs, __valid):
            return
        if self.data.get('password') != self.data.get('confirm_password'):
            self._error_info("password", "password must be equals")
            return
        # import ipdb; ipdb.set_trace()
        self.user = authenticate(
            username=self.request.user.username,
            password=kwargs.get('current')
        )
        if not self.user:
            self._error_info("user", "current invalid")
            return

        return True

    def change_password2(self):
        if not self.valid_change_password2(self.data):
            return

        self.user.set_password(self.data.get("password"))
        self.user.save()
        self.result = {"result": "exitoso"}
