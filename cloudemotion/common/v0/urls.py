from rest_framework import routers
from cloudemotion.common.v0.views import (
    UploadView, PositionsView,
    )

router = routers.DefaultRouter()

router.register(r'upload', UploadView, base_name='upload')
router.register(r'positions', PositionsView, base_name='positions')
