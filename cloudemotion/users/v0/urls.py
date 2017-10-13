"""configuration_test URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/1.10/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  url(r'^$', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  url(r'^$', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.conf.urls import url, include
    2. Add a URL to urlpatterns:  url(r'^blog/', include('blog.urls'))
"""
# from django.conf.urls import url, include
from rest_framework import routers
from .views import (LoginViewSet, PasswordViewSet,
                    UserViews, ProfileViewSet,
                    SicknessViewsets,
                    RolesViewsets,
                    EthnicitiesViewsets,
                    FetishesViewsets,
                    PreferenceViewsets,
                    ProfessionsViewsets,
                    PhysicalConflectionsViewsets,
                    HobbiesViewsets,
                    UserAdminViews,
                    ConfirmationViewSet,
                    HobbiesProfileViewSet,
                    PreferenceProfileViewSet,
                    FetishesProfileViewSet,
                    SicknessProfileViewSet,
                    ProfileUserViewSet,
                    UserAppViewSet,
                    UserAppHViewSet,
                    FolderUserViewSet,
                    FolderUserImageViewSet,
                    SearchPlacesViewSet,
                    Login1ViewSet,
                    SearchUsersViewSet,
                    MoveImageViewSet,
                    MoveFileViewSet,
                    DashboardViewSet,
                    FavoriteUserViewSet,
                    PasswordChangeViewSet
                    )
# from rest_framework.urlpatterns import format_suffix_patterns

router = routers.SimpleRouter()
router.register(r'auth', LoginViewSet, base_name='auth')
router.register(r'auth1', Login1ViewSet, base_name='auth1')
router.register(r'users', UserViews, base_name='users')
router.register(r'users_admin', UserAdminViews, base_name='users_admin')
router.register(r'sickness', SicknessViewsets, base_name='sickness')
router.register(r'roles', RolesViewsets, base_name='roles')
router.register(r'ethnicities', EthnicitiesViewsets, base_name='ethnicities')
router.register(r'fetishes', FetishesViewsets, base_name='fetishes')
router.register(r'preference', PreferenceViewsets, base_name='preference')
router.register(r'professions', ProfessionsViewsets, base_name='professions')
router.register(r'conflections', PhysicalConflectionsViewsets, base_name='conflections')
router.register(r'hobbies', HobbiesViewsets, base_name='hobbies')
router.register(r'hobbies_user', HobbiesProfileViewSet, base_name='hobbies_user')
router.register(r'preference_user', PreferenceProfileViewSet, base_name='preference_user')
router.register(r'fetishes_user', FetishesProfileViewSet, base_name='fetishes_user')
router.register(r'sickness_user', SicknessProfileViewSet, base_name='sickness_user')
router.register(r'confirmation', ConfirmationViewSet, base_name='confirmation')
router.register(r'recovery', PasswordViewSet, base_name='recovery')
router.register(r'confirmation', ConfirmationViewSet, base_name='confirmation')
router.register(r'profile', ProfileViewSet, base_name='profile')
router.register(r'information', ProfileUserViewSet, base_name='information')
router.register(r'search_user', UserAppViewSet, base_name='search_user')
router.register(r'home_app', UserAppHViewSet, base_name='home_app')
router.register(r'folder', FolderUserViewSet, base_name='folder')
router.register(r'file_folder', FolderUserImageViewSet, base_name='file_folder')
router.register(r'move_file', MoveFileViewSet, base_name='move_file')
router.register(r'search_places', SearchPlacesViewSet, base_name='search_places')
router.register(r'folder_users', SearchUsersViewSet, base_name='folder_users')
router.register(r'move_file', MoveImageViewSet, base_name='move_file')
router.register(r'dashboard', DashboardViewSet, base_name='dashboard')
router.register(r'favorite_user', FavoriteUserViewSet, base_name='favorite_user')
router.register(
    r'change_password', PasswordChangeViewSet, base_name='change_password')
