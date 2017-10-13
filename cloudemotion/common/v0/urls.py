from rest_framework import routers
from gaver.common.v0.views import (
    UploadView, CountryView, PositionViewsets, CityView, StateView,
    CountriesView, CitysView, StatesView
    )

router = routers.DefaultRouter()

router.register(r'upload', UploadView, base_name='upload')
router.register(r'countries', CountryView, base_name='countries')
router.register(r'countries_app', CountriesView, base_name='countries_app')
router.register(r'cities', CityView, base_name='cities')
router.register(r'citys_app', CitysView, base_name='citys_app')
router.register(r'states', StateView, base_name='states')
router.register(r'states_app', StatesView, base_name='states_app')
router.register(r'position', PositionViewsets, base_name='position')
