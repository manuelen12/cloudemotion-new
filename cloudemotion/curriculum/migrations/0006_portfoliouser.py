# -*- coding: utf-8 -*-
# Generated by Django 1.10.8 on 2017-12-15 19:02
from __future__ import unicode_literals

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
        ('curriculum', '0005_portfolios_screenshot'),
    ]

    operations = [
        migrations.CreateModel(
            name='PortfolioUser',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('portfolio', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='port_p', to='curriculum.Portfolios')),
                ('user', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='port_us', to=settings.AUTH_USER_MODEL)),
            ],
            options={
                'db_table': 'portfolio_user',
            },
        ),
    ]
