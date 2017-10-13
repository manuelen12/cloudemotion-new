from django.db import models

# Create your models here.


class Person(models.Model):
    first_name = models.CharField(max_length=50, blank=True)
    last_name = models.CharField(max_length=50, blank=True)
    birthday = models.DateField()
    nationality = models.CharField(max_length=20, blank=True)
    profession = models.CharField(max_length=20, blank=True)
    phone = models.CharField(max_length=20, blank=True)
    email = models.CharField(max_length=50, blank=True)
    skype = models.CharField(max_length=50, blank=True)
    facebook = models.CharField(max_length=50, blank=True)
    twitter = models.CharField(max_length=50, blank=True)
    linkedin = models.CharField(max_length=50, blank=True)
    about_me = models.TextField()
    position = models.CharField(max_length=20, blank=True)
    # code = models.CharField(max_length=3)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'persons'

    def __str__(self):
        return self.name


class Experience(models.Model):
    start_date = models.DateField()
    ending_date = models.DateField()
    company = models.CharField(max_length=50)
    address = models.TextField()
    position = models.CharField(max_length=50)
    description = models.TextField()
    person = models.ForeignKey(Person, related_name='person_experience')
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'experiences'

    def __str__(self):
        return self.name


class Education(models.Model):
    start_date = models.DateField()
    ending_date = models.DateField()
    institute = models.CharField(max_length=50)
    address = models.TextField()
    title = models.CharField(max_length=50)
    person = models.ForeignKey(Person, related_name='person_education')
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'educations'

    def __str__(self):
        return self.name


class Course(models.Model):
    start_date = models.DateField()
    ending_date = models.DateField()
    institute = models.CharField(max_length=50)
    address = models.TextField()
    course_name = models.CharField(max_length=50)
    person = models.ForeignKey(Person, related_name='person_course')
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'courses'

    def __str__(self):
        return self.name


class Skill(models.Model):
    name = models.CharField(max_length=50)
    category = models.CharField(max_length=50)
    person = models.ForeignKey(Person, related_name='person_skill')
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'skills'

    def __str__(self):
        return self.name


class Languaje(models.Model):
    name = models.CharField(max_length=50)
    category = models.CharField(max_length=50)
    person = models.ForeignKey(Person, related_name='person_languaje')
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'languajes'

    def __str__(self):
        return self.name


class Portfolio(models.Model):
    name = models.CharField(max_length=50)
    person = models.ForeignKey(Person, related_name='person_portfolio')
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'portfolios'

    def __str__(self):
        return self.name


class Classification(models.Model):
    name = models.CharField(max_length=50)
    image = models.CharField(max_length=250, blank=True, null=True)
    category = models.CharField(max_length=50)
    person = models.ForeignKey(Person, related_name='person_classification')
    portfolio = models.ManyToManyField(Portfolio, null=True, blank=True)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'classifications'

    def __str__(self):
        return self.name
