from django.contrib.auth.models import AbstractUser
from django.core.urlresolvers import reverse
from django.db import models
from django.utils.encoding import python_2_unicode_compatible
#from django.utils.translation import ugettext_lazy as _


@python_2_unicode_compatible
class User(AbstractUser):

    # First Name and Last Name do not cover name patterns
    # around the globe.
    position = models.ForeignKey("common.Positions", null=True)
    city = models.ForeignKey("common.Cities", null=True)
    image = models.CharField(max_length=250, blank=True, null=True)
    birthday = models.DateField(null=True)
    phone = models.CharField(max_length=20, null=True, blank=True)
    address = models.TextField(null=True)
    gender = models.BooleanField(default=False)
    skype = models.CharField(max_length=200, null=True, blank=True)
    # facebook = models.CharField(max_length=200, blank=True)
    twitter = models.CharField(max_length=200, null=True, blank=True)
    linkedin = models.CharField(max_length=200, null=True, blank=True)
    youtube = models.CharField(max_length=200, null=True, blank=True)
    about_me = models.TextField(null=True)
    # code = models.CharField(max_length=3)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.username

    def get_absolute_url(self):
        return reverse('users:detail', kwargs={'username': self.username})


class UsersNationalities(models.Model):
    user = models.ForeignKey(User, blank=True, related_name='user_nat')
    nationality = models.ForeignKey("common.Nationalities", blank=True)

    class Meta:
        app_label = 'users'
        db_table = 'user_nationalities'

    def __str__(self):
        return str(self.id)


class UsersProfessions(models.Model):
    user = models.ForeignKey(User, blank=True, related_name='user_prof')
    profession = models.ForeignKey("common.Professions", blank=True)

    class Meta:
        app_label = 'users'
        db_table = 'user_professions'

    def __str__(self):
        return str(self.id)
