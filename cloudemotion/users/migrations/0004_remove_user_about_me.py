# -*- coding: utf-8 -*-
# Generated by Django 1.10.8 on 2017-10-28 13:58
from __future__ import unicode_literals

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('users', '0003_auto_20171027_1808'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='user',
            name='about_me',
        ),
    ]
