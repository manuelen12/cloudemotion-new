# -*- coding: utf-8 -*-
# Generated by Django 1.10.8 on 2017-10-27 18:08
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('users', '0002_auto_20171026_1839'),
    ]

    operations = [
        migrations.AlterField(
            model_name='user',
            name='image',
            field=models.CharField(blank=True, max_length=250, null=True),
        ),
    ]
