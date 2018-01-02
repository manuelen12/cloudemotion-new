from django.contrib.auth.models import AbstractUser
from django.core.urlresolvers import reverse
from django.db import models
from django.utils.encoding import python_2_unicode_compatible
#from django.utils.translation import ugettext_lazy as _


class WpUsers(models.Model):
    id = models.BigAutoField(
        db_column='ID', primary_key=True)  # Field name made lowercase.
    user_login = models.CharField(max_length=60)
    user_pass = models.CharField(max_length=255)
    user_nicename = models.CharField(max_length=50)
    user_email = models.CharField(max_length=100)
    user_url = models.CharField(max_length=100)
    user_registered = models.DateTimeField()
    user_activation_key = models.CharField(max_length=255)
    user_status = models.IntegerField()
    display_name = models.CharField(max_length=250)

    class Meta:
        app_label = 'users'
        db_table = 'wp_users'

    def __str__(self):
        return self.user_login + "/" + self.display_name


class WpPosts(models.Model):
    id = models.BigAutoField(db_column='ID', primary_key=True)
    post_author = models.ForeignKey(
        WpUsers, related_name="wpuser_wp_post", db_column='post_author')
    post_date = models.DateTimeField()
    post_date_gmt = models.DateTimeField()
    post_content = models.TextField()
    post_title = models.TextField()
    post_excerpt = models.TextField()
    post_status = models.CharField(max_length=20)
    comment_status = models.CharField(max_length=20)
    ping_status = models.CharField(max_length=20)
    post_password = models.CharField(max_length=255)
    post_name = models.CharField(max_length=200)
    to_ping = models.TextField()
    pinged = models.TextField()
    post_modified = models.DateTimeField()
    post_modified_gmt = models.DateTimeField()
    post_content_filtered = models.TextField()
    post_parent = models.ForeignKey('self', db_column='post_parent', related_name="wppost_post_paren")
    guid = models.CharField(max_length=255)
    menu_order = models.IntegerField()
    post_type = models.CharField(max_length=20)
    post_mime_type = models.CharField(max_length=100)
    comment_count = models.BigIntegerField()

    class Meta:
        managed = False
        db_table = 'wp_posts'


@python_2_unicode_compatible
class User(AbstractUser):

    # First Name and Last Name do not cover name patterns
    # around the globe.
    userwp = models.OneToOneField(WpUsers, null=True)
    position = models.ForeignKey("common.Positions", null=True)
    city = models.ForeignKey("common.Cities", null=True)
    image = models.CharField(max_length=250, blank=True, null=True)
    birthday = models.DateField(null=True)
    phone = models.CharField(max_length=20, null=True, blank=True)
    address = models.TextField(null=True)
    gender = models.BooleanField(default=False)
    skype = models.CharField(max_length=200, null=True, blank=True)
    curriculum_es = models.CharField(max_length=200, blank=True)
    curriculum_en = models.CharField(max_length=200, blank=True)
    twitter = models.CharField(max_length=200, null=True, blank=True)
    linkedin = models.CharField(max_length=200, null=True, blank=True)
    youtube = models.CharField(max_length=200, null=True, blank=True)
    # about_me = models.TextField(null=True)
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
