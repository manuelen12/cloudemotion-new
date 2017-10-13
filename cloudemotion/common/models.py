from django.db import models
from django.conf import settings

# Create your models here.


class Countries(models.Model):
    name = models.CharField(max_length=200, blank=True)
    code = models.CharField(max_length=3)
    phone_code = models.CharField(max_length=200, null=True)
    tz = models.CharField(max_length=200, null=True)
    status = models.BooleanField(default=True)

    class Meta:
        app_label = 'common'
        db_table = 'countries'

    def __str__(self):
        return self.name


class States(models.Model):
    name = models.CharField(max_length=100)
    country = models.ForeignKey(Countries, related_name='country_state')
    status = models.BooleanField(default=True)

    class Meta:
        app_label = 'common'
        db_table = 'states'

    def __str__(self):
        return self.name


class Cities(models.Model):
    name = models.CharField(max_length=100)
    state = models.ForeignKey(States, related_name="state_city")
    status = models.BooleanField(default=True)

    class Meta:
        app_label = 'common'
        db_table = 'cities'

    def __str__(self):
        return self.name


class Positions(models.Model):
    name = models.CharField(max_length=100, unique=True, null=False)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'common'
        db_table = 'positions'

    def __str__(self):
        return self.name


class Nationalities(models.Model):
    name = models.CharField(max_length=100, unique=True, null=False)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'common'
        db_table = 'nationalities'

    def __str__(self):
        return self.name


class Professions(models.Model):
    name = models.CharField(max_length=100, unique=True, null=False)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'common'
        db_table = 'professions'

    def __str__(self):
        return self.name


class Languajes(models.Model):

    name = models.CharField(max_length=100)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'common'
        db_table = 'languajes'

    def __str__(self):
        return self.name
