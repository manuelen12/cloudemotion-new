# -*- coding: utf-8 -*-
# Generated by Django 1.10.8 on 2017-10-27 18:08
from __future__ import unicode_literals

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('curriculum', '0001_initial'),
    ]

    operations = [
        migrations.CreateModel(
            name='PortfolioSkill',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('description', models.TextField()),
            ],
            options={
                'db_table': 'portfolio_skill',
            },
        ),
        migrations.AddField(
            model_name='portfolios',
            name='company',
            field=models.ForeignKey(default=1, on_delete=django.db.models.deletion.CASCADE, related_name='company_portfolio', to='curriculum.Companies'),
            preserve_default=False,
        ),
        migrations.AddField(
            model_name='portfolios',
            name='year',
            field=models.IntegerField(default=2017),
            preserve_default=False,
        ),
        migrations.AlterField(
            model_name='portfolios',
            name='image',
            field=models.CharField(blank=True, max_length=250, null=True),
        ),
        migrations.AddField(
            model_name='portfolioskill',
            name='portfolio',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='s_por', to='curriculum.Portfolios'),
        ),
        migrations.AddField(
            model_name='portfolioskill',
            name='skill',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='s_com', to='curriculum.Skills'),
        ),
    ]
