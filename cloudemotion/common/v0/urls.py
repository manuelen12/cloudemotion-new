from rest_framework import routers
from cloudemotion.common.v0.views import (
    UploadView, PositionsView, LanguajesView
    )

router = routers.DefaultRouter()

router.register(r'upload', UploadView, base_name='upload')
router.register(r'positions', PositionsView, base_name='positions')
router.register(r'languajes', LanguajesView, base_name='languajes')
