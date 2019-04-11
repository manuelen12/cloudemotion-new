# -*- coding: utf-8 -*-
# Generated by Django 1.10.8 on 2017-10-26 18:39
from __future__ import unicode_literals

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
        ('common', '0001_initial'),
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
    ]

    operations = [
        migrations.CreateModel(
            name='Classifications',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=50)),
                ('category', models.CharField(max_length=50)),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
            ],
            options={
                'db_table': 'classifications',
            },
        ),
        migrations.CreateModel(
            name='Companies',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=50)),
                ('phone', models.CharField(max_length=50)),
                ('email', models.EmailField(max_length=50)),
                ('address', models.TextField()),
                ('responsable', models.CharField(max_length=100)),
                ('responsible_phone', models.CharField(max_length=50)),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
            ],
            options={
                'db_table': 'companies',
            },
        ),
        migrations.CreateModel(
            name='Courses',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
            ],
            options={
                'db_table': 'courses',
            },
        ),
        migrations.CreateModel(
            name='CoursesUser',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('start_date', models.DateField()),
                ('ending_date', models.DateField()),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
                ('course', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='curriculum.Courses')),
            ],
            options={
                'db_table': 'courses_user',
            },
        ),
        migrations.CreateModel(
            name='Educations',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
            ],
            options={
                'db_table': 'educations',
            },
        ),
        migrations.CreateModel(
            name='EducationsUser',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('type_educations', models.SmallIntegerField(choices=[(1, 'Basic'), (2, 'diversified'), (3, 'Academic')], default=1)),
                ('start_date', models.DateField()),
                ('ending_date', models.DateField()),
                ('title', models.CharField(max_length=50)),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
                ('education', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='curriculum.Educations')),
            ],
            options={
                'db_table': 'educations_user',
            },
        ),
        migrations.CreateModel(
            name='ExperienceLanguage',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('description', models.TextField()),
            ],
            options={
                'db_table': 'experience_language',
            },
        ),
        migrations.CreateModel(
            name='Experiences',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('start_date', models.DateField()),
                ('ending_date', models.DateField()),
                ('title', models.TextField()),
                ('description', models.TextField()),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
                ('company', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='company_experience', to='curriculum.Companies')),
                ('position', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='common.Positions')),
                ('user', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='ex_user', to=settings.AUTH_USER_MODEL)),
            ],
            options={
                'db_table': 'experiences',
            },
        ),
        migrations.CreateModel(
            name='Institutes',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('address', models.TextField()),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
            ],
            options={
                'db_table': 'institutes',
            },
        ),
        migrations.CreateModel(
            name='LanguajesUser',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('level', models.SmallIntegerField(choices=[(1, 'Basic'), (2, 'Medium'), (3, 'Advanced')], default=1)),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
                ('languaje', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='common.Languajes')),
                ('user', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='l_user', to=settings.AUTH_USER_MODEL)),
            ],
            options={
                'db_table': 'languajes_user',
            },
        ),
        migrations.CreateModel(
            name='PortfolioLanguage',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('description', models.TextField()),
                ('language', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='p_lan', to='common.Languajes')),
            ],
            options={
                'db_table': 'portfolio_language',
            },
        ),
        migrations.CreateModel(
            name='Portfolios',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=50)),
                ('description', models.TextField()),
                ('image', models.ImageField(null=True, upload_to='')),
                ('url', models.TextField()),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
                ('classification', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='classification_portfolio', to='curriculum.Classifications')),
                ('user', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='p_user', to=settings.AUTH_USER_MODEL)),
            ],
            options={
                'db_table': 'portfolios',
            },
        ),
        migrations.CreateModel(
            name='Skills',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
            ],
            options={
                'db_table': 'skills',
            },
        ),
        migrations.CreateModel(
            name='SkillsUser',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('level', models.SmallIntegerField(choices=[(1, 1), (2, 2), (3, 3), (4, 4), (5, 5)], default=1)),
                ('status', models.BooleanField(default=True)),
                ('create_at', models.DateTimeField(auto_now_add=True)),
                ('skill', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='curriculum.Skills')),
                ('user', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='s_user', to=settings.AUTH_USER_MODEL)),
            ],
            options={
                'db_table': 'skills_user',
            },
        ),
        migrations.CreateModel(
            name='UserLanguage',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('about_me', models.TextField()),
                ('language', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='common.Languajes')),
                ('user', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='lan_user', to=settings.AUTH_USER_MODEL)),
            ],
            options={
                'db_table': 'user_language',
            },
        ),
        migrations.AddField(
            model_name='portfoliolanguage',
            name='portfolio',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='l_por', to='curriculum.Portfolios'),
        ),
        migrations.AddField(
            model_name='experiencelanguage',
            name='experience',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='l_exp', to='curriculum.Experiences'),
        ),
        migrations.AddField(
            model_name='experiencelanguage',
            name='language',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='e_lan', to='common.Languajes'),
        ),
        migrations.AddField(
            model_name='educationsuser',
            name='institute',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='curriculum.Institutes'),
        ),
        migrations.AddField(
            model_name='educationsuser',
            name='user',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='edu_user', to=settings.AUTH_USER_MODEL),
        ),
        migrations.AddField(
            model_name='coursesuser',
            name='institute',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='curriculum.Institutes'),
        ),
        migrations.AddField(
            model_name='coursesuser',
            name='user',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='c_user', to=settings.AUTH_USER_MODEL),
        ),
    ]