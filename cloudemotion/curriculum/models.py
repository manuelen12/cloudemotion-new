from django.db import models
from django.conf import settings

# Create your models here.


class Companies(models.Model):
    name = models.CharField(max_length=50)
    phone = models.CharField(max_length=50)
    email = models.EmailField(max_length=50)
    address = models.TextField()
    responsable = models.CharField(max_length=100)
    responsible_phone = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'companies'

    def __str__(self):
        return self.name


class Experiences(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='roon_u')
    company = models.ForeignKey(
        Companies, related_name='company_experience')
    position = models.ForeignKey("common.Position")
    start_date = models.DateField()
    ending_date = models.DateField()
    description = models.TextField()
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'experiences'

    def __str__(self):
        return self.name


class CompaniesExperiences(models.Model):
    education = models.ForeignKey(Experiences, blank=True)
    institute = models.ForeignKey(Companies, blank=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'companies_experiences'

    def __str__(self):
        return self.name


class Educations(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='roon_u')
    start_date = models.DateField()
    ending_date = models.DateField()
    title = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'educations'

    def __str__(self):
        return self.name


class Courses(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='roon_u')
    start_date = models.DateField()
    ending_date = models.DateField()
    course_name = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'courses'

    def __str__(self):
        return self.name


class Institutes(models.Model):
    education = models.ForeignKey(
        Educations, related_name='education_institute')
    course = models.ForeignKey(
        Courses, related_name='course_institute')
    name = models.CharField(max_length=50)
    address = models.TextField()
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'institutes'

    def __str__(self):
        return self.name


class InstitutesEducations(models.Model):
    education = models.ForeignKey(Educations, blank=True)
    institute = models.ForeignKey(Institutes, blank=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'institutes_educations'

    def __str__(self):
        return self.name


class InstitutesCourses(models.Model):
    course = models.ForeignKey(Courses, blank=True)
    institute = models.ForeignKey(Institutes, blank=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'institutes_courses'

    def __str__(self):
        return self.name


class Skills(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='roon_u')
    name = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'skills'

    def __str__(self):
        return self.name


class Languajes(models.Model):
    __types = (
       (1, "Basic"),
       (2, "Medium"),
       (3, "Advanced"),
    )
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='roon_u')
    type_languajes = models.SmallIntegerField(
       default=1, choices=__types)
    name = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'languajes'

    def __str__(self):
        return self.name


class Portfolios(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='roon_u')
    name = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'portfolios'

    def __str__(self):
        return self.name


class Classifications(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='roon_u')
    name = models.CharField(max_length=50)
    image = models.CharField(max_length=250, blank=True, null=True)
    category = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'classifications'

    def __str__(self):
        return self.name


class PortfoliosClassifications(models.Model):
    portfolio = models.ForeignKey(Portfolios, blank=True)
    classification = models.ForeignKey(Classifications, blank=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'portfolios_classifications'

    def __str__(self):
        return self.name
